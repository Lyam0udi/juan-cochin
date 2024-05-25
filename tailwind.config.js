const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class', // Ensure this is set to 'class'
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        fontFamily: {
            primary: "Playfair Display",
            body: "work Sans",
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                lg: "5rem", // Must be updated latter
            },
        },
        extend: {
            colors: {
                // Define your light mode colors
                "light-primary": "#FFFFFF", // Light mode primary color
                "light-secondary": "#F0F0F0", // Light mode secondary color
                "light-tail-100": "#CCE7E8", // Light mode accent color
                "light-tail-500": "#007C7C", // Light mode text color
        
                // Define your dark mode colors
                "dark-primary": "#121212", // Dark mode primary color
                "dark-secondary": "#1E1E1E", // Dark mode secondary color
                "dark-navy-100": "#07567D", // Dark mode accent color
                "dark-navy-500": "#292D42", // Dark mode text color
        
                // Define a custom accent color with hover state
                accent: {
                    DEFAULT: "#FF8C00", // Default accent color
                    hover: "#FF7F11", // Accent color when hovered over
                },
        
                // Define a custom color for paragraphs
                paragraph: "#5C5C5C", // Light mode paragraph color
                "dark-paragraph": "#B0B0B0", // Dark mode paragraph color
        
                // Include Tailwind's default colors
                blue: colors.blue,
                indigo: colors.indigo,
                green: colors.green,
                red: colors.red,
            },
        },
        
    },

    plugins: [require("@tailwindcss/forms")],
};
