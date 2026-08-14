import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    react(),
    tailwindcss(),
  ],
  build: {
    outDir: 'public/build',
    manifest: true,
    rollupOptions: {
      input: [
        'resources/css/app.css',
        'resources/js/app.jsx',
      ],
    },
  },
  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
  },
});
