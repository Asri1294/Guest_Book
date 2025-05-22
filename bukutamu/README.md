# Buku Tamu Digital 

Mini Web App untuk mencatat kunjungan tamu.

## Fitur
- Input data tamu dengan waktu otomatis
- Tampilan responsive dengan Bootstrap
- Pencarian data tamu
- Penyimpanan ke database MySQL

## Instalasi
1. *Persyaratan*:
   - XAMPP/LAMPP (phpMyAdmin/PHP 7.4+, MySQL 5.7+, )
   - Browser modern (Chrome/Firefox/Edge)

2. *Langkah Setup*:
   via phpMyAdmin:
   - MeMbuat database `db_bukutamu`, atau
   - Import file `db_bukutamu.sql`

3. *Konfigurasi*:
   Edit `koneksi.php` sesuai setting database lokal:
   ```php
   $host = "localhost";
   $user = "root"; 
   $password = "";
   ```

## Cara Penggunaan
1. Akses form input:
   ```
   http://localhost/bukutamu/form.php
   ```
2. Isi data tamu
3. Lihat hasil di:
   ```
   http://localhost/bukutamu/daftar_tamu.php
   ```

## 📂 Struktur File
```
bukutamu/
├── form.php          # Form input tamu
├── proses.php       # Proses simpan data
├── daftar_tamu.php  # Menampilkan data
├── koneksi.php      # Konfigurasi database
└── db_bukutamu.sql  # Backup database
```

## Screenshot
| ![Form](screenshots/formBT.png) | ![Daftar](screenshots/ListTamu.png) | 
| ![Database](screenshots/db_pict.png)     | ![Waktu otomatis](screenshots/otomaticTimes.png) | 
| ![Pencarian](screenshots/searchingFitur.png) | 


## Troubleshooting
- Jika data tidak tersimpan:
  - Cek error log Apache
  - Verifikasi koneksi database di `koneksi.php`
- Jika waktu tidak sesuai:
  - Pastikan timezone server benar di `php.ini` --> di XAMPP: \xampp\php\php.ini
    - add: 
            [Date] 
            date.timezone = Asia/Jakarta
    - Restart apache
  - atau lakukan validasi di 'proses.php'
    // Di proses.php
    echo "Waktu Server: " . date('Y-m-d H:i:s');
    // Jika tidak sesuai, fix timezone
    date_default_timezone_set('Asia/Jakarta');
