import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                caa: {
                    'dark-navy': '#0D1B2A',
                    'dark-blue': '#1D3557',
                    'medium-blue': '#5D8AA8',
                    'light-blue': '#B0C4DE',
                    'off-white': '#F8F9FA',
                }
            }
        },
    },

    plugins: [forms],
};
