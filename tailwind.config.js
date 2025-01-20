/** @type {import('tailwindcss').Config} config */

import typography from '@tailwindcss/typography';

const config = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './safelist.txt',
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '2.5rem',
        '2xl': '3rem',
      },
    },
    colors: {
      transparent: 'transparent',
      white: '#ffffff',
      black: '#0c0c0c',

      blue: {
        dark: '#074D56',
        DEFAULT: '#01697D',
        bright: '#00A0AD',
        light: '#d7eaed',
      },

      green: {
        dark: '#00A2AF',
        DEFAULT: '#65BEC5',
        light: '#f1f8f9',
      },

      gold: {
        dark: '#C68F36',
        DEFAULT: '#FFD19E',
        light: '#fefaf6',
      },

      pink: {
        dark: '#D18080',
        DEFAULT: '#EEBDBC',
        light: '#f7ecea',
      },

      beige: {
        dark: '#E4D3C4',
        DEFAULT: '#f5f1ed',
        light: '#fcfaf9',
      },
    },
    fontFamily: {
      sans: [
        'RalewayCL',
        'Raleway',
        'Avenir',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
    },
    extend: {
      borderRadius: {
        big: '7rem',
        small: '2rem',
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            '--tw-prose-body': theme('colors.blue'),
            '--tw-prose-headings': theme('colors.blue'),
            '--tw-prose-bold': theme('colors.blue'),
            '--tw-prose-links': theme('colors.blue'),
          },
        },
      }),
    },
  },
  plugins: [typography],
};

export default config;
