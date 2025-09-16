import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#2E7D32", // hijau utama
                    hover: "#2E9D27",    // hover
                    light: "#34A853",   // accent di dark mode
                    borderLight: "#000",
                    borderDark: "#fff",
                },
                background: {
                    light: "#F9FAFB",   // light mode body
                    dark: "#111827",    // dark mode body
                },
                navbar: {
                    light: "#2E7D32",   // hijau elegan
                    dark: "#1B4332",    // hunter green
                },
                card: {
                    light: "#FFFFFF",
                    dark: "#1F2937",
                },
                text: {
                    primaryLight: "#1F2937",
                    secondaryLight: "#4B5563",
                    primaryDark: "#F9FAFB",
                    secondaryDark: "#D1D5DB",
                    eror: "#ff0000"
                },
                input: {
                    bgLight: "#FFFFFF",
                    bgDark: "#1F2937",
                    borderLight: "#D1D5DB",
                    borderHoverLight: "#9CA3AF",
                    borderDark: "#374151",
                    borderHoverDark: "#4B5563",
                    textLight: "#1F2937",
                    textDark: "#F9FAFB",
                    placeholderLight: "#6B7280",
                    placeholderDark: "#9CA3AF",
                },
            },
        },
    },

    plugins: [forms],
};
