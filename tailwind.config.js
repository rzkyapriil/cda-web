/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./node_modules/preline/dist/*.js"
  ],
  theme: {
    extend: {
      fontFamily:{
        'montserrat': ['Montserrat', 'sans-serif'],
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('preline/plugin')
  ],
}