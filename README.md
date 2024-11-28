# GymWeb-Skripsi2

GymWeb-Skripsi2 adalah aplikasi manajemen gym berbasis Laravel yang menyediakan fitur untuk mengelola membership, e-wallet, dan pengecekan kehadiran menggunakan QR code.

## Fitur Utama
- **Sistem Membership**: Kelola data anggota gym dan paket membership.
- **E-Wallet**: Sistem pembayaran digital untuk keanggotaan.
- **QR Code Check-in/Check-out**: Mempermudah pengecekan kehadiran anggota.

## Teknologi
- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: AdminLTE

## Cara Instalasi
1. **Clone repository ini**:
    ```bash
    git clone https://github.com/lianysakul/gymweb-skripsi2.git
    ```
2. **Masuk ke folder proyek**:
    ```bash
    cd gymweb-skripsi2
    ```
3. **Instal dependensi menggunakan Composer**:
    ```bash
    composer install
    ```
4. **Duplikat file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database**.
5. **Jalankan migrasi database**:
    ```bash
    php artisan migrate
    ```
6. **Jalankan server**:
    ```bash
    php artisan serve
    ```
7. **Akses aplikasi di `http://localhost:8000`**.

## Tentang Laravel
Laravel adalah framework PHP yang digunakan untuk membangun aplikasi web modern. Informasi lebih lanjut dapat ditemukan di [dokumentasi Laravel](https://laravel.com/docs).

## Lisensi
Proyek ini dilisensikan di bawah lisensi [GNU GPL](https://www.gnu.org/licenses/gpl-3.0.html).
