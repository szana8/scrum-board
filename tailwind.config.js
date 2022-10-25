const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: process.env.NODE_ENV ? 'jit' : undefined,
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/js/Pages/**/*.vue",
        "./resources/js/Pages/**/**/*.vue",
        "./resources/js/**/**/*.vue",
    ],
  theme: {
    extend: {
        colors: {
            'custom-blue': '##2C3F59',
        },
        fontFamily: {
            sans: ['Nunito', ...defaultTheme.fontFamily.sans],
        },
    },
  },
  plugins: [
      require('@tailwindcss/forms'),
  ],
}
