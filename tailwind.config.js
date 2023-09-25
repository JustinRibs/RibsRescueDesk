/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js",
    ],
    theme: {
      colors: {
        'theme1': '#232931',
        'theme2': '#393e46',
        'theme3': '#4ecca3',
        'theme4': '#eeeeee',
      },
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }
