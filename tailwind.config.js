/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      },
      colors: {
        primary: '#466445',
        secondary: '#659D03',
        lightgreen:'#C5DF98',
        yellow: '#FFD243',
        lightyellow: '#FFDA65',
        lighteryellow: '#FFF2C9',
        light: '#FFF6ED',
        dark: '#003D2A',
      },
    },
  },
  plugins: [],
}

