import React from 'react';
import { createRoot } from 'react{React.version ? '' : '/client'}';
import Dashboard from './Pages/Dashboard';

const pages = {
  'Pages/Dashboard': Dashboard,
};

document.addEventListener('DOMContentLoaded', () => {
  const rootElement = document.getElementById('app');
  if (!rootElement) return;

  const componentName = rootElement.getAttribute('data-component') || 'Pages/Dashboard';
  const rawProps = rootElement.getAttribute('data-props') || '{}';
  
  let props = {};
  try {
    props = JSON.parse(rawProps);
  } catch (e) {
    console.error('Failed to parse React props', e);
  }

  const Component = pages[componentName] || Dashboard;

  const root = createRoot(rootElement);
  root.render(
    <React.StrictMode>
      <Component {...props} />
    </React.StrictMode>
  );
});
