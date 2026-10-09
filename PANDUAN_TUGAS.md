# Panduan dan Dokumentasi Tugas REST API Laravel

Dokumen ini merangkum seluruh fitur yang telah dibuat pada *backend* Laravel ini dan menyediakan panduan lengkap (layaknya tutorial) untuk melakukan pengujian menggunakan Postman/Insomnia, serta panduan singkat untuk deployment dan integrasi dengan Flutter sesuai deskripsi tugas Anda.

---

## 1. Persiapan Menjalankan Aplikasi Lokal

Pastikan Laragon sudah menyala (Apache/Nginx & MySQL).

1. Buka Terminal/PowerShell di dalam folder project ini (`C:\laragon\www\web-lanjut`).
2. Jalankan perintah server Laravel:
   ```bash
   php artisan serve
   ```
   > Aplikasi akan berjalan di **http://127.0.0.1:8000**

3. **(Opsional)** Anda dapat membuka URL `http://127.0.0.1:8000` di browser untuk melihat Web UI interaktif dan menguji operasi database secara langsung.

---

## 2. Pengujian Endpoint REST API dengan Postman / Insomnia

Sesuai dengan ketentuan tugas (Tahap 8 & 9), berikut adalah skenario CRUD API yang harus diuji dan didokumentasikan (di-screenshot).

### A. GET — Menampilkan Semua Data Produk
- **Method:** `GET`
- **URL:** `http://127.0.0.1:8000/api/products`
- **Target Response:** `HTTP 200 OK` dan menampilkan array JSON berisi list produk.

### B. GET — Detail Data Produk
- **Method:** `GET`
- **URL:** `http://127.0.0.1:8000/api/products/1` *(Ganti `1` dengan ID produk yang ada)*
- **Target Response:** `HTTP 200 OK`
- **Skenario Error (ID tidak ditemukan):** Coba akses `/api/products/9999`, target response adalah `HTTP 404 Not Found` dengan pesan error.

### C. POST — Menambahkan Data
- **Method:** `POST`
- **URL:** `http://127.0.0.1:8000/api/products`
- **Headers:** 
  - `Accept: application/json`
  - `Content-Type: application/json`
- **Body (JSON):**
  ```json
  {
      "name": "Produk Baru",
      "price": 30000
  }
  ```
- **Target Response:** `HTTP 201 Created`

### D. POST — Pengujian Validasi (Data Tidak Lengkap)
- **Method:** `POST`
- **URL:** `http://127.0.0.1:8000/api/products`
- **Headers:** `Accept: application/json`
- **Body (JSON):**
  ```json
  {
      "name": ""
  }
  ```
- **Target Response:** `HTTP 422 Unprocessable Entity` (atau `400 Bad Request`) lengkap dengan response pesan error validasi (seperti: *"The name field is required"*).

### E. PUT/PATCH — Mengubah Data
- **Method:** `PUT` (atau `PATCH`)
- **URL:** `http://127.0.0.1:8000/api/products/1`
- **Headers:** `Accept: application/json`
- **Body (JSON):**
  ```json
  {
      "name": "Produk Update",
      "price": 35000
  }
  ```
- **Target Response:** `HTTP 200 OK`

### F. DELETE — Menghapus Data
- **Method:** `DELETE`
- **URL:** `http://127.0.0.1:8000/api/products/1`
- **Headers:** `Accept: application/json`
- **Target Response:** `HTTP 200 OK`

---

## 3. Deployment ke Hosting Gratis

Sesuai tugas, *backend* Laravel ini tidak boleh hanya berjalan di localhost. Berikut rangkuman hal yang perlu disiapkan:

1. **Repository Git:** 
   - Buat repositori baru di GitHub atau GitLab.
   - Push *source code* ini ke dalam repositori tersebut.
   - **PENTING:** Pastikan file `.env` **TIDAK** ikut ter-upload. (Di Laravel, file ini otomatis diabaikan oleh `.gitignore`).
2. **Pilih Layanan Hosting Gratis:** 
   - Gunakan layanan seperti Vercel (dengan custom config), InfinityFree, Railway (jika ada sisa free tier), atau platform hosting PHP lainnya.
3. **Konfigurasi Environment Server (.env di Hosting):** 
   Nanti di *Dashboard Hosting*, Anda harus mengatur environment variables seperti:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://nama-aplikasi-anda.example.com

   DB_CONNECTION=mysql
   DB_HOST=... (Disediakan oleh layanan hosting)
   DB_PORT=3306
   DB_DATABASE=... 
   DB_USERNAME=...
   DB_PASSWORD=...
   ```
4. **Database Migration Online:** 
   - Setelah *deploy*, Anda wajib menjalankan perintah migrasi di server hosting Anda (biasanya tersedia fitur *Console/Terminal SSH*, atau bisa juga memanfaatkan mekanisme otomatis *build command* layaknya `php artisan migrate --force`).

---

## 4. Integrasi dengan Flutter

Setelah aplikasi *backend* ini berhasil di-*deploy* ke hosting, satu-satunya yang perlu diubah pada aplikasi mobile Flutter Anda adalah nilai **Base URL**.

Ubah file konfigurasi API di Flutter Anda, dari:
```dart
const baseUrl = 'http://10.0.2.2:8000/api'; // (atau localhost)
```
Menjadi:
```dart
const baseUrl = 'https://nama-aplikasi-anda.example.com/api'; // Sesuai URL dari hosting
```

Aplikasi Flutter Anda akan secara otomatis mengambil (`GET`), mengirim (`POST`), dan memanipulasi data melalui REST API yang telah _online_ ini.

---

Semoga sukses dengan tugasnya! Pastikan untuk merekam layar (video demonstrasi) pada tahapan pengujian ini sesuai dengan format pengumpulan.
