# Component Diagram - Sistem Inventaris Barang (PAW)

Berikut adalah diagram komponen yang disesuaikan dengan contoh gambar referensi (4 Package Utama) dengan notasi Interface.

```text
=============================================================
|  <<Package>>                                              |
|  FRONTEND                                                 |
=============================================================
|                                                           |
|   +-------------------+       +-------------------+       |
|   |   <<component>>   |------>|   <<component>>   |       |
|   |    Blade Templ    |       |        CSS        |       |
|   +-------------------+       +-------------------+       |
|             |                                             |
|             |_________________+-------------------+       |
|             |                 |   <<component>>   |       |
|             |---------------->|     JavaScript    |       |
|             |                 +-------------------+       |
|             v                                             |
|   +-------------------+                                   |
|   |   <<component>>   |                                   |
|   |       HTML        |                                   |
|   +-------------------+                                   |
|                                                           |
=============================================================
              |
              | (Required)
              v
      ( ) HTTP Interface
       ^
       | (Provided)
       |
=============================================================
|  <<Package>>                                              |
|  WEB SERVER                                               |
=============================================================
|                                                           |
|           +---------------------------+                   |
|           |       <<component>>       |                   |
|           |       Apache / Nginx      |                   |
|           +---------------------------+                   |
|                         |                                 |
|                         v                                 |
=============================================================
                          |
                          | (Gateway)
                          v
=============================================================
|  <<Package>>                                              |
|  BACKEND                                                  |
=============================================================
|                                                           |
|      +---------------------+     +-----------------+      |
|      |    <<component>>    |     |  <<component>>  |      |
|      |      Laravel        |---->|       PHP       |      |
|      |     Framework       |     |                 |      |
|      +---------------------+     +-----------------+      |
|                                                           |
=============================================================
                 |
                 | (Required)
                 v
         ( ) Request Interface
          ^
          | (Provided)
          |
=============================================================
|  <<Package>>                                              |
|  DATABASE                                                 |
=============================================================
|                                                           |
|      +---------------------+                              |
|      |    <<component>>    |                              |
|      |       MySQL         |                              |
|      +---------------------+                              |
|                 |                                         |
|                 v                                         |
|      +---------------------+                              |
|      |    <<component>>    |                              |
|      |   Database Storage  |                              |
|      +---------------------+                              |
|                                                           |
=============================================================
```

## Penjelasan Alur
1.  **Frontend**: Berisi komponen tampilan (Blade, CSS, JS, HTML).
2.  **HTTP Interface**: Titik komunikasi antara Client (Frontend) dan Server.
3.  **Web Server**: (Apache/Nginx) menerima request HTTP dan meneruskannya ke aplikasi.
4.  **Backend**: Aplikasi Laravel berjalan di atas PHP untuk memproses logika.
5.  **Request Interface**: Koneksi internal backend ke database.
6.  **Database**: MySQL menyimpan data fisik di storage.
