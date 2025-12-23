/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  darkMode: 'class', // Habilitar modo oscuro manual mediante clase 'dark' en html
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
      colors: {
        // Paleta de colores personalizada si es necesario, 
        // pero usaremos los defaults de Tailwind que son excelentes.
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
