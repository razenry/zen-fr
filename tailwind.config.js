/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./app/views/**/*.php",
    "./app/pulse/**/*.php",
    "./resources/js/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#f0f9ff',
          100: '#e0f2fe',
          500: '#0284c7',
          600: '#0284c7',
          700: '#0369a1',
        }
      }
    },
  },
  plugins: [],
};
