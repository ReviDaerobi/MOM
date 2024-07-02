/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      baseColor: "#D8EFD3",
      navbarColor: "#FCA311",
      sidebarColor: "#fca311",
      cardColor: "#F6F1F1",
      dangerColor: "#d1d5db",
      successColor: "#21A179",
      white: "#ffffff",
      gray300: "#d1d5db",
      gray600: "#6b7280",

    },
    extend: {
      backgroundImage: {
        'backgroundlogin': "url('/src/img/studio.jpg')",
       
      }
    },
    screens: {
      'sm': {'max': '639px'},

      'md': {'max': '767px'},

      'lg': {'max': '1023px'},

      'xl': {'max': '1279px'},
    },
    fontFamily: {
      'sans': ['Ubuntu', 'Sans-serif']
    },
    extend: {
      spacing: {
        '72': '18rem',
        '84': '21rem',
        '96': '24rem',
      },
    },
  },
  plugins: [
    
  ]
}

