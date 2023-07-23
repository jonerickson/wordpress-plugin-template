import {defineConfig} from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      publicDirectory: 'src/public',
      input: ['src/resources/js/app.js'],
      refresh: true
    })
  ]
})
