/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: ["./**/*.php"],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
      }
    },
    extend: {
      colors: {
        'primary': {
          DEFAULT: "#FED116",
        },
        'dark-grey': {
          '1': '#1F1E20',
          '2': '#2C2D2C',
          '3': '#707070',
          '4': '#0D0606',
        },
        'dark-blue': {
          '1': '#0032A1',
        },
        'dark-green': {
          '1': '#00833E',
        },
        'danger': {
          DEFAULT: '#dc3545',
        },
      },
      screens: {
        '2xl': '1312px'
      },
      fontFamily: {
        'base': ["Inter", ...defaultTheme.fontFamily.sans],
        'icomoon': ['icomoon'],
      },
    },
  },
  plugins: [],
}
