<div class="container py-4">
    <!-- Hero Banner (Docs Theme Cohesive & Dynamic i18n) -->
    <div class="card border-0 shadow-sm rounded-4 p-5 text-center mb-5" style="background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); border: 1px solid #e5e7eb !important;">
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-2 mb-3">
            <?php App\Core\App::Component('feature_badge', ['text' => 'PHP 8.0+ Ready', 'icon' => 'bi bi-lightning-charge-fill']); ?>
            <?php App\Core\App::Component('feature_badge', ['text' => 'Service & Repository Pattern', 'icon' => 'bi bi-diagram-3-fill']); ?>
            <?php App\Core\App::Component('feature_badge', ['text' => 'Zen Pulse Reactive Engine', 'icon' => 'bi bi-activity']); ?>
            <?php App\Core\App::Component('feature_badge', ['text' => 'RESTful API Suite', 'icon' => 'bi bi-code-slash']); ?>
            
            <!-- Version Switcher Dropdown (Bootstrap-style) -->
            <div class="dropdown ms-2">
                <button class="btn btn-outline-primary btn-sm dropdown-toggle rounded-pill px-3 fw-bold shadow-sm" type="button" id="versionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-tag-fill me-1"></i> Version: v6.0.0 (Latest Major)
                </button>
                <ul class="dropdown-menu shadow border-0 rounded-3" aria-labelledby="versionDropdown">
                    <li><h6 class="dropdown-header text-uppercase small fw-bold text-muted">Framework Versions</h6></li>
                    <li><a class="dropdown-item active fw-bold" href="#"><i class="bi bi-check2 me-2 text-success"></i> v6.0.0 (Latest Major - Branch: v6.0.0)</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v5.0.0" target="_blank"><i class="bi bi-git me-2"></i> v5.0.0 (Database Major)</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v4.1.0" target="_blank"><i class="bi bi-git me-2"></i> v4.1.0 (Patch Release)</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v4.0.0" target="_blank"><i class="bi bi-git me-2"></i> v4.0.0 (Release)</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v3.4.0" target="_blank"><i class="bi bi-git me-2"></i> v3.4.0</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v3.3.0" target="_blank"><i class="bi bi-git me-2"></i> v3.3.0</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v3.2.0" target="_blank"><i class="bi bi-git me-2"></i> v3.2.0</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v3.0.0" target="_blank"><i class="bi bi-git me-2"></i> v3.0.0</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v2.0.4" target="_blank"><i class="bi bi-git me-2"></i> v2.0.4</a></li>
                    <li><a class="dropdown-item" href="https://github.com/razenry/zen-fr/tree/v1.0.0" target="_blank"><i class="bi bi-git me-2"></i> v1.0.0</a></li>
                </ul>
            </div>
        </div>
        
        <h1 class="display-4 fw-extrabold mb-3 tracking-tight text-dark" style="font-weight: 800; letter-spacing: -0.03em; color: #0f172a;">
            <?= lang('hero_title', 'Zen PHP Framework') ?>
        </h1>
        <p class="lead text-secondary max-w-2xl mx-auto mb-4" style="color: #475569; max-width: 750px; font-size: 1.15rem; line-height: 1.7;">
            <?= lang('hero_subtitle', 'Framework PHP modern ultra-ringan...') ?>
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="https://github.com/razenry/zen-fr/tree/docs" target="_blank" class="btn btn-primary btn-lg rounded-3 px-4 py-2.5 fw-bold shadow-sm">
                <i class="bi bi-book-half me-2"></i> <?= lang('btn_docs', 'Buka Dokumentasi') ?>
            </a>
            <a href="#demo-section" class="btn btn-outline-custom btn-lg rounded-3 px-4 py-2.5 fw-bold">
                <i class="bi bi-play-circle-fill me-2"></i> <?= lang('btn_demo', 'Coba Demo Interaktif') ?>
            </a>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="row g-4 mb-5">
        <div class="col-md-3 col-6">
            <?php App\Core\App::Component('stats_card', ['value' => '0.21s', 'label' => lang('stat_speed'), 'icon' => 'bi bi-speedometer2', 'color' => 'success']); ?>
        </div>
        <div class="col-md-3 col-6">
            <?php App\Core\App::Component('stats_card', ['value' => '100%', 'label' => lang('stat_pattern'), 'icon' => 'bi bi-diagram-3', 'color' => 'primary']); ?>
        </div>
        <div class="col-md-3 col-6">
            <?php App\Core\App::Component('stats_card', ['value' => '0-Dep', 'label' => lang('stat_realtime'), 'icon' => 'bi bi-cpu', 'color' => 'warning']); ?>
        </div>
        <div class="col-md-3 col-6">
            <?php App\Core\App::Component('stats_card', ['value' => 'RESTful', 'label' => lang('stat_api'), 'icon' => 'bi bi-cloud-check', 'color' => 'info']); ?>
        </div>
    </div>

    <!-- Live Interactive Showcase Section -->
    <div id="demo-section" class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-extrabold mb-1" style="font-weight: 800; letter-spacing: -0.02em; color: #0f172a;"><?= lang('showcase_title') ?></h2>
                <p class="text-secondary mb-0"><?= lang('showcase_subtitle') ?></p>
            </div>
        </div>

        <!-- Navigation Tabs (Sleek Clean Responsive Layout) -->
        <ul class="nav nav-pills d-flex flex-wrap gap-2 bg-white p-2 rounded-3 shadow-sm border mb-4" id="showcaseTab" role="tablist">
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link active fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="pulse-tab" data-bs-toggle="tab" data-bs-target="#pulse-pane" type="button" role="tab">
                    <i class="bi bi-activity me-2"></i> <?= lang('tab_pulse') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="api-tab" data-bs-toggle="tab" data-bs-target="#api-pane" type="button" role="tab">
                    <i class="bi bi-code-slash me-2"></i> <?= lang('tab_api') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="storage-tab" data-bs-toggle="tab" data-bs-target="#storage-pane" type="button" role="tab">
                    <i class="bi bi-folder-symlink me-2"></i> <?= lang('tab_storage') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="cache-queue-tab" data-bs-toggle="tab" data-bs-target="#cache-queue-pane" type="button" role="tab">
                    <i class="bi bi-hdd-rack me-2"></i> <?= lang('tab_cache_queue') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="gate-tab" data-bs-toggle="tab" data-bs-target="#gate-pane" type="button" role="tab">
                    <i class="bi bi-shield-lock me-2"></i> <?= lang('tab_gate') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="arch-tab" data-bs-toggle="tab" data-bs-target="#arch-pane" type="button" role="tab">
                    <i class="bi bi-diagram-3 me-2"></i> <?= lang('tab_arch') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="cli-tab" data-bs-toggle="tab" data-bs-target="#cli-pane" type="button" role="tab">
                    <i class="bi bi-terminal me-2"></i> <?= lang('tab_cli') ?>
                </button>
            </li>
            <li class="nav-item flex-grow-1 text-center" role="presentation">
                <button class="nav-link fw-bold py-2.5 px-3 rounded-2 w-100 text-nowrap" id="patch-tab" data-bs-toggle="tab" data-bs-target="#patch-pane" type="button" role="tab">
                    <i class="bi bi-patch-check me-2"></i> <?= lang('tab_patch') ?>
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="showcaseTabContent">
            <!-- TAB 1: ZEN PULSE -->
            <div class="tab-pane fade show active" id="pulse-pane" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="bg-white p-4 rounded-3 shadow-sm border h-100">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold m-0 text-dark"><?= lang('pulse_embedded_title') ?></h5>
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-semibold">App\Pulse\Counter</span>
                            </div>
                            <p class="text-secondary small mb-4">
                                <?= lang('pulse_embedded_desc') ?>
                            </p>
                            
                            <!-- Render Component Counter -->
                            <?= \App\Core\ZenPulseComponent::renderComponent('Counter') ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="bg-white p-4 rounded-3 shadow-sm border h-100 d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-broadcast me-2 text-primary"></i> <?= lang('pulse_sse_title') ?></h5>
                                <p class="text-secondary small mb-3">
                                    <?= lang('pulse_sse_desc') ?>
                                </p>

                                <div class="p-3 bg-dark rounded-3 text-light font-monospace small mb-3 pre-box">
                                    <div class="text-secondary mb-1">// Listener SSE Element</div>
                                    <div zen-sse="ping" id="sse-status-box" class="text-success">
                                        <i class="bi bi-dot animate-ping me-1"></i> <?= lang('pulse_sse_listening') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info border-0 bg-info bg-opacity-10 text-info small mb-0 rounded-3">
                                <i class="bi bi-info-circle-fill me-2"></i> <?= lang('pulse_info') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: RESTful API Live Tester -->
            <div class="tab-pane fade" id="api-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="fw-bold m-0 text-dark"><?= lang('api_tester_title') ?></h5>
                            <p class="text-secondary small m-0"><?= lang('api_tester_desc') ?></p>
                        </div>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <button id="btn-api-ping" class="btn btn-outline-custom w-100 p-3 text-start rounded-3">
                                <div class="badge bg-success mb-1">GET</div>
                                <div class="fw-bold text-dark">/api/v1/ping</div>
                                <div class="small text-secondary"><?= lang('api_ping_label') ?></div>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button id="btn-api-products" class="btn btn-outline-custom w-100 p-3 text-start rounded-3">
                                <div class="badge bg-success mb-1">GET</div>
                                <div class="fw-bold text-dark">/api/v1/products</div>
                                <div class="small text-secondary"><?= lang('api_products_label') ?></div>
                            </button>
                        </div>
                        <div class="col-md-4">
                            <button id="btn-api-val-err" class="btn btn-outline-custom w-100 p-3 text-start rounded-3">
                                <div class="badge bg-warning text-dark mb-1">POST</div>
                                <div class="fw-bold text-dark">/api/v1/products</div>
                                <div class="small text-secondary"><?= lang('api_val_err_label') ?></div>
                            </button>
                        </div>
                    </div>

                    <div class="bg-dark text-light p-4 rounded-3 pre-box">
                        <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom border-secondary border-opacity-25">
                            <span class="small font-monospace text-secondary"><?= lang('api_output_title') ?></span>
                            <span id="api-status-badge" class="badge bg-secondary"><?= lang('api_awaiting') ?></span>
                        </div>
                        <pre id="api-response-output" class="m-0 text-success font-monospace" style="max-height: 250px; overflow-y: auto;"><?= lang('api_prompt') ?></pre>
                    </div>
                </div>
            </div>

            <!-- TAB 3: Multi-Disk File Storage System -->
            <div class="tab-pane fade" id="storage-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <h5 class="fw-bold text-dark mb-2"><i class="bi bi-folder-symlink text-primary me-2"></i> Multi-Disk File Storage Engine</h5>
                    <p class="text-secondary small mb-4">Sistem abstraksi penyimpanan file terpadu (Public, Local, S3 Cloud) dengan URL bertenggat waktu (signed URL) & upload fluen.</p>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-1">// Standard & Cloud Multi-Disk API</div>
                                <div class="text-info">Storage::disk('public')->put('avatar.jpg', $data);</div>
                                <div class="text-info mt-2">Storage::disk('s3')->get('documents/report.pdf');</div>
                                <div class="text-success mt-2">$url = Storage::disk('s3')->temporaryUrl('file.pdf', 1800);</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-1">// Fluent Controller Upload Helpers</div>
                                <div class="text-warning">$path = $request->file('avatar')->store('avatars', 's3');</div>
                                <div class="text-warning mt-2">$path = $request->file('doc')->storeAs('docs', 'inv.pdf');</div>
                                <div class="text-success mt-2">$path = $request->file('photo')->storePublicly('photos');</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 4: Cache Engine & Queue Jobs -->
            <div class="tab-pane fade" id="cache-queue-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <h5 class="fw-bold text-dark mb-2"><i class="bi bi-hdd-rack text-warning me-2"></i> Cache Engine & Background Queue Jobs</h5>
                    <p class="text-secondary small mb-4">Akselerasi performa dengan file/memory caching serta penanganan tugas berat di latar belakang secara asinkron.</p>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-1">// Cache Facade API</div>
                                <div class="text-info">Cache::put('key', 'value', 3600);</div>
                                <div class="text-info mt-2">$val = Cache::remember('users', 3600, fn() => User::all());</div>
                                <div class="text-warning mt-2">Cache::forget('key'); // php zen cache:clear</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-1">// Background Queue Jobs</div>
                                <div class="text-success">ProcessPodcastJob::dispatch($podcast);</div>
                                <div class="text-secondary mt-2">// Worker Runner via Terminal:</div>
                                <div class="text-warning">php zen queue:work</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 5: Gate Authorization & Security -->
            <div class="tab-pane fade" id="gate-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <h5 class="fw-bold text-dark mb-2"><i class="bi bi-shield-lock text-danger me-2"></i> Authorization (Gates & Policies) & Throttling</h5>
                    <p class="text-secondary small mb-4">Kontrol hak akses berbasis peran & kebijakan keamanan serta pembatasan rate limit API.</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-1">// Gate Authorization API</div>
                                <div class="text-info">Gate::define('edit-post', fn($u, $p) => $u->id === $p->user_id);</div>
                                <div class="text-success mt-2">if (Gate::allows('edit-post', $user, $post)) { ... }</div>
                                <div class="text-warning mt-2">Gate::authorize('edit-post', $user, $post);</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-1">// Rate Limiter & Policies CLI</div>
                                <div class="text-info">Route::middleware('throttle:60,1');</div>
                                <div class="text-warning mt-2">php zen make:policy UserPolicy</div>
                                <div class="text-success mt-2">php zen schedule:run</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 6: Service & Repository Layer -->
            <div class="tab-pane fade" id="arch-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <h5 class="fw-bold text-dark mb-2"><?= lang('arch_title') ?></h5>
                    <p class="text-secondary small mb-4">
                        <?= lang('arch_desc') ?>
                    </p>

                    <div class="row g-4">
                        <?php if(!empty($products)): ?>
                            <?php foreach($products as $product): ?>
                                <div class="col-md-4">
                                    <div class="card h-100 border p-3 rounded-3 shadow-none card-premium">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge bg-primary bg-opacity-10 text-primary">ID #<?= $product->id ?></span>
                                            <span class="fw-bold text-success">Rp <?= number_format($product->price ?? 0, 0, ',', '.') ?></span>
                                        </div>
                                        <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($product->name ?? $product->title ?? 'Sample Product') ?></h6>
                                        <p class="text-secondary small mb-0"><?= htmlspecialchars($product->description ?? lang('arch_processed')) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-secondary border-0 text-center py-4 mb-0 rounded-3">
                                    <?= lang('arch_empty') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- TAB 7: Zen CLI & Database Seeders -->
            <div class="tab-pane fade" id="cli-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <h5 class="fw-bold text-dark mb-2"><?= lang('cli_title') ?></h5>
                    <p class="text-secondary small mb-4"><?= lang('cli_desc') ?></p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-2"><?= lang('cli_comment_setup') ?></div>
                                <div class="text-warning">php zen setup</div>
                                <div class="text-secondary mt-3 mb-2"><?= lang('cli_comment_seeder') ?></div>
                                <div class="text-success">php zen db:seed</div>
                                <div class="text-secondary mt-3 mb-2"><?= lang('cli_comment_test') ?></div>
                                <div class="text-success">php zen test</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-dark text-light rounded-3 font-monospace pre-box">
                                <div class="text-secondary mb-2"><?= lang('cli_comment_scaffold') ?></div>
                                <div class="text-info">php zen make:job ProcessOrderJob</div>
                                <div class="text-info">php zen make:policy ProductPolicy</div>
                                <div class="text-info">php zen cache:clear</div>
                                <div class="text-info">php zen queue:work</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 8: Patch Notes & Upgrade -->
            <div class="tab-pane fade" id="patch-pane" role="tabpanel">
                <div class="bg-white p-4 rounded-3 shadow-sm border">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 pb-3 border-bottom">
                        <div>
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-bold mb-2"><?= lang('badge_patch') ?></span>
                            <h4 class="fw-extrabold text-dark m-0"><?= lang('patch_title') ?></h4>
                            <p class="text-secondary small mb-0 mt-1"><?= lang('patch_subtitle') ?></p>
                        </div>
                        <a href="https://github.com/razenry/zen-fr/blob/docs/resources/docs/patch-notes.md" target="_blank" class="btn btn-primary rounded-3 px-3 py-2 font-monospace fw-semibold shadow-sm">
                            Read Full Release Notes <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-success bg-opacity-10 border border-success rounded-3 h-100">
                                <h6 class="fw-bold text-success mb-2"><i class="bi bi-check-circle-fill me-1"></i> <?= lang('badge_new') ?></h6>
                                <ul class="small text-secondary mb-0 ps-3">
                                    <li>Enhanced Multi-Disk Storage System & Signed URLs</li>
                                    <li>Cache Engine & Background Queue Jobs</li>
                                    <li>Gate Authorization, Task Scheduler & Rate Limiter</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-primary bg-opacity-10 border border-primary rounded-3 h-100">
                                <h6 class="fw-bold text-primary mb-2"><i class="bi bi-lightning-fill me-1"></i> <?= lang('badge_buff') ?></h6>
                                <ul class="small text-secondary mb-0 ps-3">
                                    <li>ORM Attribute Casts & Mutator Enhancements</li>
                                    <li>Pest PHP Test Suite Execution (0.25s)</li>
                                    <li>New CLI Generators: <code>make:job</code> & <code>make:policy</code></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="bg-dark text-light p-4 rounded-3 font-monospace pre-box">
                        <div class="text-secondary mb-2">// <?= lang('upgrade_proc_title') ?></div>
                        <div class="text-info">composer update razenry/zen-php</div>
                        <div class="text-warning mt-2">php zen clear</div>
                        <div class="text-warning">php zen cache:clear</div>
                        <div class="text-warning">php zen migrate</div>
                        <div class="text-warning">php zen db:seed</div>
                        <div class="text-success">php zen test</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // API Tester Handlers
    const out = document.getElementById('api-response-output');
    const badge = document.getElementById('api-status-badge');

    document.getElementById('btn-api-ping')?.addEventListener('click', async () => {
        out.textContent = 'Fetching GET /api/v1/ping...';
        try {
            const res = await fetch('<?= baseUrl("api/v1/ping") ?>');
            const data = await res.json();
            badge.className = 'badge bg-success';
            badge.textContent = res.status + ' OK';
            out.textContent = JSON.stringify(data, null, 4);
        } catch (e) {
            out.textContent = 'Error: ' + e.message;
        }
    });

    document.getElementById('btn-api-products')?.addEventListener('click', async () => {
        out.textContent = 'Fetching GET /api/v1/products...';
        try {
            const res = await fetch('<?= baseUrl("api/v1/products") ?>');
            const data = await res.json();
            badge.className = 'badge bg-success';
            badge.textContent = res.status + ' OK';
            out.textContent = JSON.stringify(data, null, 4);
        } catch (e) {
            out.textContent = 'Error: ' + e.message;
        }
    });

    document.getElementById('btn-api-val-err')?.addEventListener('click', async () => {
        out.textContent = 'Sending POST /api/v1/products (Empty Payload Test)...';
        try {
            const res = await fetch('<?= baseUrl("api/v1/products") ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({})
            });
            const data = await res.json();
            badge.className = 'badge bg-warning text-dark';
            badge.textContent = res.status + ' Unprocessable Entity';
            out.textContent = JSON.stringify(data, null, 4);
        } catch (e) {
            out.textContent = 'Error: ' + e.message;
        }
    });
});
</script>
