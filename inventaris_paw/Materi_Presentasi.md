# Materi Presentasi Sistem Inventaris (Penyimpanan PAW)

Dokumen ini berisi materi penjelasan untuk presentasi Google Docs/Slides. Anda dapat menyalin setiap bagian ke dalam slide atau dokumen Anda.

---

## Bagian 1: Judul & Pembukaan

**Judul Presentasi:**
Sistem Informasi Manajemen Inventaris (Inventory Management System)

**Sub-judul:**
Optimalisasi Pengelolaan Data Barang Berbasis Web dengan Laravel

**Identitas:**
- Nama: [Nama Anda]
- NIM/Kelas: [NIM/Kelas Anda]
- Mata Kuliah: Pengembangan Aplikasi Web (PAW)

---

## Bagian 2: Pendahuluan

**Latar Belakang:**
Pengelolaan inventaris secara manual seringkali rentan terhadap kesalahan pencatatan, kehilangan data, dan sulitnya pelacakan stok. Oleh karena itu, dibutuhkan sebuah sistem berbasis web yang dapat mencatat, memantau, dan mengelola data barang secara efisien dan real-time.

**Tujuan Sistem:**
1.  Mempermudah pencatatan barang masuk dan keluar.
2.  Menyediakan laporan stok yang akurat.
3.  Membedakan hak akses antara Administrator dan Manajer untuk keamanan data.

---

## Bagian 3: Teknologi yang Digunakan

Sistem ini dibangun menggunakan teknologi web modern untuk memastikan performa yang cepat dan tampilan yang responsif.

-   **Backend Framework:** Laravel (PHP) - Framework PHP yang tangguh dan aman.
-   **Frontend:** Blade Templating Engine, CSS/Bootstrap (untuk tampilan UI).
-   **Database:** MySQL - Untuk penyimpanan data relasional.
-   **Tools:** Laragon/XAMPP (Server Lokal), Git (Version Control).

---

## Bagian 4: Fitur Utama Sistem

### 1. Otentikasi & Keamanan (Authentication & Security)
-   **Login Sistem:** Akses dibatasi hanya untuk pengguna terdaftar.
-   **Multi-Role User:**
    -   **Admin:** Memiliki akses penuh untuk mengelola data barang (CRUD - Create, Read, Update, Delete).
    -   **Manajer:** Akses khusus untuk memantau dashboard dan laporan (View Only).

### 2. Dashboard Interaktif
Halaman utama yang menyajikan ringkasan data penting secara visual:
-   Total Jumlah Barang.
-   Total Stok Keseluruhan.
-   Jumlah Kategori Barang.
-   Daftar Barang Terbaru (Baru ditambahkan/diupdate).
-   Statistik per Kategori.

### 3. Manajemen Inventaris (CRUD Barang)
Fitur inti untuk mengelola data operasional:
-   **Create (Tambah):** Menambahkan data barang baru (Nama, Kategori, Stok, Lokasi).
-   **Read (Lihat):** Menampilkan daftar barang dalam tabel yang rapi.
-   **Update (Edit):** Memperbarui informasi stok atau detail barang.
-   **Delete (Hapus):** Menghapus data barang yang tidak valid atau sudah tidak ada.

---

## Bagian 5: Struktur Database (Schema)

Sistem menggunakan database relasional dengan tabel utama sebagai berikut:

**1. Tabel `users` (Pengguna)**
-   `id`: Primary Key
-   `username`: Username unik
-   `first_name` & `last_name`: Nama lengkap
-   `email`: Email pengguna
-   `password`: Kata sandi (terenkripsi)
-   `role`: Peran pengguna ('admin' atau 'manajer')

**2. Tabel `barangs` (Data Barang)**
-   `id`: Primary Key
-   `nama_barang`: Nama item
-   `kategori`: Kelompok jenis barang
-   `stok`: Jumlah ketersediaan (Integer)
-   `lokasi`: Tempat penyimpanan barang
-   `created_at`: Waktu barang dibuat
-   `updated_at`: Waktu barang terakhir diubah

---

## Bagian 6: Alur Demonstrasi (Demo Flow)

Saat melakukan demonstrasi aplikasi, berikut adalah alur yang disarankan:

1.  **Halaman Login:** Tunjukkan validasi keamanan (tidak bisa masuk tanpa akun).
2.  **Login sebagai Admin:**
    -   Perlihatkan Dashboard Admin.
    -   Lakukan **Tambah Barang** (Input data dummy).
    -   Lakukan **Edit Barang** (Ubah stok atau lokasi).
    -   Lakukan **Hapus Barang** (Contoh penghapusan).
3.  **Login sebagai Manajer:**
    -   Tunjukkan perbedaan tampilan (hanya bisa melihat Dashboard/Laporan, menu terbatas).
4.  **Logout:** Keluar dari sistem.

---

## Bagian 7: Kesimpulan

Sistem Inventaris ini memberikan solusi praktis untuk masalah pencatatan manual. Dengan fitur *Role-Based Access Control* dan manajemen CRUD yang lengkap, sistem ini siap digunakan untuk kebutuhan operasional penyimpanan barang berskala kecil hingga menengah.

---
*Terima kasih.*
