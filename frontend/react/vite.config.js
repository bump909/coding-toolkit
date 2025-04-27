import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'
import tailwindcss from '@tailwindcss/vite'
export default defineConfig({
  base: './', // Set base path to current directory and serve assets relative to it
  plugins: [
    react(),
    tailwindcss(),
  ],
})