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
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                body: '#121212',       // Body → paling dasar
                wrapper: '#1E1E1E',    // Content wrapper
                sidebar: '#2A2A2A',    // Sidebar
                navbar: '#333333',     // Navbar
                card: '#2A2A2A',       // Card
                modal: '#3D3D3D',      // Modal
            },
        },
    },

    plugins: [forms],
};
