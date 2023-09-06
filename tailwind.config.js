/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#fbc454'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

