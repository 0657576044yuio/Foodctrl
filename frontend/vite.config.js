import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],

  build: {
    outDir: '../../backend/admin', // สร้างไฟล์ build ไว้ในโฟลเดอร์ 'public/dist' ของ PHP
  },
  server: {
    proxy: {
      '/api': 'http://localhost:3001', // ใช้ Proxy ในการติดต่อกับ API ของ PHP
    },
  },
  
})
