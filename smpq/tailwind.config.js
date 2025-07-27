/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./application/views/**/*.php",
    "./public/**/*.html",
    "./public/**/*.js",
    "./public/**/*.css",
  ],
  theme: {
    extend: {
      boxShadow: {
        custom:
          "0 4px 6px -1px rgba(8, 68, 118, 0.5), 0 2px 4px -1px rgba(8, 68, 118, 0.06)",
        featuredShadow: "0 -2px 5px  rgba(8, 68, 118,.25) inset",
      },
      transitionDuration: {
        10000: "10000ms",
      },
      zIndex: {
        60: "60",
        70: "70",
        80: "80",
        90: "90",
        999: "999",
      },
      width: {
        "9.5/12": "80%",
      },
      aspectRatio: {
        "4/3": "4 / 3",
      },
      fontFamily: {
        Poppins: ["Poppins", "sans-serif"],
        Montserrat: ["Montserrat", "serif"],
        Quicksand: ["Quicksand", "sans-serif"],
        Boldonse: ["Boldonse", "sans-serif"],
      },
      fontSize: {
        xxs: "0.65rem",
        "3xs": "0.45rem",
      },
      colors: {
        primary: "#F19F15",
        primaryLight: "#ffc053",
        primaryDark: "#d88d0c",
        secondary: "#084476",
      },
      backgroundColor: {
        primary: "#F19F15",
        secondary: "#084476",
      },
      backgroundSize: {
        "50%": "50%",
        20: "6rem",
        16: "4rem",
        10: "2.5rem",
      },
    },
    variants: {
      display: ["group-hover", "responsive"],
    },
  },
  plugins: [],
};
