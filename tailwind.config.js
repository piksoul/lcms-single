/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./templates/pages/**/*.php",
    "./templates/pages/_partials/tailwind/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        heading: ['Inter', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('daisyui'),
  ],
  daisyui: {
    themes: [
      {
        lcms: {
          "primary": "#2563eb",
          "primary-content": "#ffffff",
          "secondary": "#1e40af",
          "secondary-content": "#ffffff",
          "accent": "#3b82f6",
          "accent-content": "#ffffff",
          "neutral": "#1f2937",
          "neutral-content": "#f9fafb",
          "base-100": "#ffffff",
          "base-200": "#f8fafc",
          "base-300": "#e2e8f0",
          "base-content": "#1f2937",
          "info": "#0ea5e9",
          "success": "#22c55e",
          "warning": "#f59e0b",
          "error": "#ef4444",
        },
      },
      "light",
      "dark",
    ],
    defaultTheme: "lcms",
  },
}
