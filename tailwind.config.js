import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'primary': '#000000',
            'primaryB' : '#B6B6B6',
            'accent': '#7572FF',
            'danger': '#E72424',
            'positive': '#2ECC71',
            'warning': '#F39C12',
            'black': '#212429',
            'gray4': '#495057',
            'gray3': '#7C7D7E',
            'gray2': '#DDE2E5',
            'gray1': '#F8F9FA',
            'white': '#FFFFFF',
        }
    },

    plugins: [forms],
};
