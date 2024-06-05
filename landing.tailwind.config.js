/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: false, // or 'media' or 'class'
    content: [
      "./resources/views/landing/**/*.blade.php",
      "./resources/views/l-build-b/**/*.blade.php",
    ],
    theme: {
      extend: {
        container: {
          center: true,
          padding: '1rem'
        }
      },
    },
    plugins: [
      require('tw-elements/dist/plugin'),
      require('@tailwindcss/aspect-ratio'),
      function ({ addComponents }) {
        addComponents({
            '.container': {
                maxWidth: '100%',
                '@screen sm': {
                  maxWidth: '576px',
                },
                '@screen md': {
                  maxWidth: '768px',
                },
                '@screen lg': {
                  maxWidth: '922px',
                },
                '@screen xl': {
                  maxWidth: '1140px',
                },
            }
        })
      }
    ],
  }
