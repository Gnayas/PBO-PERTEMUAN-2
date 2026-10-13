# Program Penghitungan Diskon Toko - GESTORE

NAMA : GNAYAS AL HARITS 
NIM : 2530521067
PRODI : TEKNIK INFORMATIKA 3C 

Repository ini berisi program berbasis web sederhana menggunakan **PHP**, **HTML** dan **CSS** yang dirancang untuk memenuhi tugas praktikum PBO TI 3C. 
Program ini berfungsi sebagai aplikasi kasir mini untuk menghitung total transaksi belanja dan diskon secara otomatis.

## Fitur Program
* **Input Dinamis**: Pengguna dapat memasukkan nama pembeli, nama produk, harga satuan, jumlah pembelian (qty), serta status keanggotaan.
* **Sistem Diskon Bertingkat**: Menghitung diskon secara otomatis berdasarkan besar nominal belanja.
* **Status Member VIP**: Memberikan tambahan diskon sebesar 5% bagi pembeli yang terdaftar sebagai Member VIP.
* **Rincian Item (Struk)**: Menampilkan tabel rincian transaksi beserta simulasi daftar item satuan.

---

## Ketentuan Tugas yang Terpenuhi
1. **Minimal 4 Variabel dengan Tipe Data Berbeda**:
   * `$nama_pembeli` & `$nama_barang` (Tipe Data: `String`)
   * `$jumlah_beli` (Tipe Data: `Integer`)
   * `$harga_satuan` (Tipe Data: `Float`)
   * `$status_vip` (Tipe Data: `Boolean`)
2. **Percabangan (`Control Flow`)**: Menggunakan struktur `if-elseif-else` untuk menentukan persentase potongan harga.
3. **Perulangan (`Looping`)**: Menggunakan perulangan `for` untuk mencetak rincian item barang satuan belanja.
4. **Fungsi Buatan Sendiri (`User-Defined Function`)**: Menggunakan fungsi khusus bernama `hitungDiskonBelanja()` untuk memproses kalkulasi harga secara modular.

---

## Tools yang Digunakan
* **Visual Studio Code** (Text Editor)
* **XAMPP Control Panel / Apache** (Local Web Server & PHP Interpreter)
* **Web Browser** (Google Chrome / Edge)

---

## ⚙️ Cara Menjalankan Program
1. Pastikan aplikasi **XAMPP** sudah terinstal di komputer Anda.
2. Nyalakan modul **Apache** pada XAMPP Control Panel.
3. Salin folder proyek ini ke dalam direktori `C:\xampp\htdocs\`.
4. Buka browser Anda dan akses melalui URL:
   `http://localhost/nama-folder-proyek-anda/`
