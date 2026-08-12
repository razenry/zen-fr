/**
 * Zen Pulse & Realtime Engine
 * Extremely lightweight zero-dependency reactive state management for Zen PHP Framework
 */

(function () {
    'use strict';

    class ZenPulseEngine {
        constructor() {
            this.initEndpoints();
            this.pollers = [];
            this.debounceTimers = {};
            this.init();
        }

        initEndpoints() {
            let base = '';
            if (typeof window.ZEN_BASE_URL !== 'undefined' && window.ZEN_BASE_URL) {
                base = window.ZEN_BASE_URL.replace(/\/+$/, '');
            } else {
                base = window.location.origin + window.location.pathname.replace(/\/docs(\/.*)?$/, '').replace(/\/about(\/.*)?$/, '').replace(/\/+$/, '');
            }
            this.endpoint = base + '/_zen/pulse';
            this.sseEndpoint = base + '/_zen/sse';
        }

        init() {
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', () => this.bindEvents());
            } else {
                this.bindEvents();
            }
        }

        findComponentRoot(el) {
            return el.closest('[zen-id], [zen\\:id], [zen-component], [zen\\:component]');
        }

        bindEvents() {
            // Event delegation for zen-click
            document.addEventListener('click', (e) => {
                const clickEl = e.target.closest('[zen-click]');
                if (clickEl) {
                    e.preventDefault();
                    const actionAttr = clickEl.getAttribute('zen-click');
                    const componentEl = this.findComponentRoot(clickEl);
                    if (componentEl) {
                        this.callAction(componentEl, actionAttr);
                    }
                }
            });

            // Input binding for zen-model
            document.addEventListener('input', (e) => {
                const modelEl = e.target.closest('[zen-model]');
                if (modelEl) {
                    const propName = modelEl.getAttribute('zen-model');
                    const componentEl = this.findComponentRoot(modelEl);
                    if (componentEl) {
                        const val = modelEl.type === 'checkbox' ? modelEl.checked : modelEl.value;
                        
                        clearTimeout(this.debounceTimers[propName]);
                        this.debounceTimers[propName] = setTimeout(() => {
                            this.updateProperty(componentEl, propName, val);
                        }, 200);
                    }
                }
            });

            // Form submission for zen-submit
            document.addEventListener('submit', (e) => {
                const formEl = e.target.closest('[zen-submit]');
                if (formEl) {
                    e.preventDefault();
                    const actionAttr = formEl.getAttribute('zen-submit');
                    const componentEl = this.findComponentRoot(formEl);
                    if (componentEl) {
                        this.callAction(componentEl, actionAttr);
                    }
                }
            });
        }

        getComponentData(componentEl) {
            const id = componentEl.getAttribute('zen-id') || componentEl.getAttribute('zen:id');
            const component = componentEl.getAttribute('zen-component') || componentEl.getAttribute('zen:component');
            let stateRaw = componentEl.getAttribute('zen-state') || componentEl.getAttribute('zen:state') || '{}';
            
            if (stateRaw.includes('&quot;')) {
                stateRaw = stateRaw.replace(/&quot;/g, '"').replace(/&amp;/g, '&');
            }

            let state = {};
            try {
                state = JSON.parse(stateRaw);
            } catch (err) {
                console.error('ZenPulse state parse error:', err, 'Raw:', stateRaw);
            }
            return { id, component, state };
        }

        parseAction(actionStr) {
            const match = actionStr.match(/^([a-zA-Z0-9_]+)(?:\((.*)\))?$/);
            if (!match) return { action: actionStr, args: [] };

            const action = match[1];
            let args = [];
            if (match[2]) {
                try {
                    args = JSON.parse('[' + match[2] + ']');
                } catch (e) {
                    args = [match[2].replace(/^['"]|['"]$/g, '')];
                }
            }
            return { action, args };
        }

        async callAction(componentEl, actionStr) {
            const { id, component, state } = this.getComponentData(componentEl);
            const { action, args } = this.parseAction(actionStr);

            const payload = { id, component, state, action, args };
            await this.send(componentEl, payload);
        }

        async updateProperty(componentEl, property, value) {
            const { id, component, state } = this.getComponentData(componentEl);
            state[property] = value;

            const payload = { id, component, state, property, value };
            await this.send(componentEl, payload);
        }

        async send(componentEl, payload) {
            try {
                componentEl.style.opacity = '0.7';
                
                const response = await fetch(this.endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) {
                    throw new Error('HTTP error ' + response.status);
                }

                const result = await response.json();
                if (result.html !== undefined) {
                    const activeInput = document.activeElement;
                    let activeModelProp = null;
                    let cursorPosition = null;

                    if (activeInput && componentEl.contains(activeInput) && activeInput.hasAttribute('zen-model')) {
                        activeModelProp = activeInput.getAttribute('zen-model');
                        cursorPosition = activeInput.selectionStart;
                    }

                    componentEl.innerHTML = result.html;
                    const stateStr = JSON.stringify(result.state);
                    componentEl.setAttribute('zen-state', stateStr);
                    componentEl.setAttribute('zen:state', stateStr);
                    componentEl.style.opacity = '1';

                    if (activeModelProp) {
                        const newInput = componentEl.querySelector(`[zen-model="${activeModelProp}"]`);
                        if (newInput) {
                            newInput.focus();
                            if (cursorPosition !== null && newInput.setSelectionRange) {
                                try { newInput.setSelectionRange(cursorPosition, cursorPosition); } catch(e){}
                            }
                        }
                    }
                }
            } catch (error) {
                componentEl.style.opacity = '1';
                console.error('ZenPulse error:', error);
            }
        }
    }

    window.ZenPulse = new ZenPulseEngine();
})();
