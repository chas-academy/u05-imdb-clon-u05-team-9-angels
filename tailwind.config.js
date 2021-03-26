const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            tableLayout: ["hover", "focus"],
            colors: {
                imdb: {
                    black: "#0f0e1b",
                    blue: "#4e51ff",
                    "blue-dark": "#282aa9",
                    "blue-light": "#9c9dfa",
                    gray: "#676672",
                    "gray-dark": "#4d4c56",
                    "gray-light": "#a8a7b6",
                    green: "#00bb6c",
                    "green-dark": "#00884f",
                    "green-light": "#51ebaa",
                    purpure: "#ef4d88",
                    "purpure-dark": "#8b274b",
                    "purpure-light": "#ff9fc2",
                    red: "#e83535",
                    "red-dark": "#ac2020",
                    "red-light": "#ff8888",
                    card: "#3a3948",
                    border: "#b9b8c3",
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
