/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#989158',
                secondary: {
                    100: '#E2E2D5',
                    200: '#888883'
                }
            },
            fontFamily: {
                Custom: ['Nunito'],
                Custom2: ['Kanit']
            }
        },
    },
    plugins: [],
}
