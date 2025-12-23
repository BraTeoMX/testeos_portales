/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,js,php}",
    "./src/**/*.{html,js,php}"
  ],
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
      colors: {
        // Agregando color 'brown' (basado en tonos estandar de logo corporativo/stone)
        brown: {
          50: '#fdf8f6',
          100: '#f2e8e5',
          200: '#eaddd7',
          300: '#e0cec7',
          400: '#d2bab0',
          500: '#a07e72', // Main brown perception
          600: '#8d6e63', // Material Brown 400
          700: '#5d4037', // Material Brown 700 (Oscuro)
          800: '#4e342e',
          900: '#3e2723',
        },
        brand: {
          50: '#f0f9ff',
          100: '#e0f2fe',
          500: '#0ea5e9',
          600: '#0284c7',
          900: '#0c4a6e',
        }
      }
    },
  },
  plugins: [],
}
