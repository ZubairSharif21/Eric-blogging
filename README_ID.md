<p align="center"><a href="https://blog.bellawan.my.id" target="_blank"><img src="https://bellawan.my.id/img/favicon.png" width="100" alt="Bellawan Logo" style="box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);" /></a></p>
<p align="center"><a href="https://blog.bellawan.my.id" style="text-decoration: none;"><span style=" background-clip:text; -webkit-background-clip: text;color:transparent; background-image:linear-gradient(to right,#38bdf8,#059669); font-size: 36px; font-weight: 700;">BK Blog</span></a></p>

## Tentang Eric Blog

Eric Blog adalah sistem manajemen blog/sistem manajemen konten yang dibangun dengan framework Laravel.

Eric Blog merupakan proyek ambisius untuk menuangkan ide dan gagasan, dengan cara yang menyenangkan dan intuitif. Berawal dari hobi dan ketertarikan pada blogging, tahun 2010 Saya mulai ikut terjun di dunia blogging. Pada tahun itu teknologi web belum secanggih sekarang. Blogspot dan Wordpress adalah aplikasi yang sangat umum digunakan bagi siapapun yang memulai blogging, termasuk Saya.

Dengan berkembangnya teknologi web, dan banyaknya framework yang sangat mempermudah untuk membuat web dari nol, Saya mencoba membuat ulang blog pertama saya yang masih menggunakan Blogspot.

Kunjungi project blog Saya di [Eric Blog Website](https://blog.bellawan.my.id)

## Fitur

Semua fitur didukung dengan kontrol antar muka dashboard yang sangat powerful.

### Fitur Dasar

Aplikasi ini memiliki fitur utama yaitu sistem blog. Yang secara awal dikembangkan agar dapat digunakan untuk sarana kolaborasi, baik konten maupun pengembangan source code. Beberapa fitur dasar aplikasi blog yang sedang dalam pengembangan adalah:

-   Post
-   Kategori
-   Tag
-   Pengguna
-   Komentar

#### 1.1 Manajemen Pos

#### 1.2 Manajemen Kategori

#### 1.3 Manajemen Tag

#### 1.4 Manajemen Pengguna (on going)

Fitur manajemen pengguna memiliki fungsi utama untuk memudahkan superadmin mengelola semua pengguna. Termasuk memberikan izin khusus kepada pengguna lain untuk mendapatkan akses tertentu.

Hak akses dasar Pengguna :

1. Superadmin (full control)
2. User (membuat pos, komentar)
3. Visitor (membuat komentar)

Hak izin khusus termasuk namun tidak terbatas pada modifikasi dan moderasi :

1. Post
2. Kategori
3. Tag
4. User
5. Komentar

#### 1.5 Manajemen Komentar (on going)

Pengguna yang telah terdaftar dapat langsung memberikan komentar pada blog post. User juga dapat saling berinteraksi dengan membalas komentar user lainnya. Fitur komentar ini secara default akan memunculkan notifikasi di dashboard, apabila ada interaksi dari pengguna lain.

## Teknologi

Proyek ini tidak akan muncul apabila tidak ada teknologi yang sangat membantu berikut ini.

-   **[Laravel 10](#laravel)**
-   **[Livewire 3](#livewire)**
-   **[TailwindCSS 3](#tailwind)**
-   **[EditorJS 2](#editorjs)**

### Versi Perangkat Lunak

| No  | Perangkat Lunak                            |  Versi |
| :-: | ------------------------------------------ | -----: |
| 1.  | [Laravel](#laravel)                        |  10.48 |
| 2.  | [Laravel - Livewire + AlpineJS](#livewire) |    3.4 |
| 3.  | [TailwindCSS](#tailwind)                   |  3.4.1 |
| 4.  | [EditorJS](#editorjs)                      | 2.28.2 |

### Laravel<a name="laravel"></a>

Laravel adalah kerangka kerja aplikasi web dengan sintaks yang ekspresif dan elegan. Kerangka kerja web menyediakan struktur dan titik awal untuk membuat aplikasi Anda, sehingga Anda dapat fokus untuk membuat sesuatu yang luar biasa sementara kami mengerjakan detailnya.

[Dokumentasi Laravel](https://laravel.com/docs/10.x/installation)

### Livewire + AlpineJS<a name="livewire"></a>

Laravel Livewire adalah sebuah framework untuk membangun frontend yang didukung oleh Laravel yang terasa dinamis, modern, dan hidup seperti halnya frontend yang dibangun dengan framework JavaScript modern seperti Vue dan React.

[Dokumentasi Livewire](https://livewire.laravel.com/docs/quickstart)

### TailwindCSS<a name="tailwind"></a>

Bangun situs web modern dengan cepat tanpa meninggalkan HTML Anda.

Kerangka kerja CSS yang mengutamakan utilitas yang dikemas dengan kelas-kelas seperti flex, pt-4, text-center, dan rotate-90 yang dapat dikomposisikan untuk membuat desain apa pun, langsung dalam markup Anda.

[Dokumentasi TailwindCSS](https://tailwindcss.com/docs/installation)

### EditorJS<a name="editorjs"></a>

Editor gaya-blok gratis dengan keluaran JSON universal.

Editor.js memberikan daya maksimum untuk pengembang dan produk yang tetap fokus pada pengalaman pengguna.

[EditorJS documentation](https://editorjs.io/getting-started/)

## Cara menggunakan

Pertama, Anda harus sudah memiliki Git, PHP, dan Composer terinstall pada device. Lakukan clone pada repository ini.

```
git clone https://github.com/belankus/Eric Blog.git bkblog
```

Masuk ke dalam folder kerja anda

```
cd bkblog
```

Lakukan install package

```
composer install
```

Buat file .env dan konfigurasi koneksi ke database

```
cp .env.example .env
```

Buat APP_KEY agar aplikasi dapat berjalan

```
php artisan key:generate
```

Lakukan migrasi ke database, atur koneksi database anda di file .env

```
php artisan migrate
```

(PENTING!) Lakukan database seeding

```
php artisan db:seed --class=AllPoliciesSeeder
```

Buat link storage

```
php artisan storage:link
```

Jalankan aplikasi di browser https://localhost

```
php artisan serve
```

Access Point Dashboard
`http://localhost/login`
Email : `superadmin@bellawan.my.id`
Password : `password`

**Note** :

1. Aplikasi secara default membutuhkan koneksi SSL (https), apabila anda tidak memilikinya berikan comment/hapus service `\App\Http\Middleware\ForceHttps::class` di folder `app/Http/Kernel.php` pada baris code

```
$middlewareGroups = [
    'web' => [
        ...
        \App\Http\Middleware\ForceHttps::class
        ...
    ]
]
```

2. File storage aplikasi secara default terhubung ke folder `public/images`. Apablia anda ingin mengembalikan ke setting default, buka `.env`, pada bagian `APP_DISK_LINK` ganti `images` dengan `storage`

```
 APP_DISK_LINK=images
```

Setelah merubah, jalankan kembali `php artisan storage:link`

## Ucapan Terima Kasih

Proyek ini terinspirasi dari orang-orang hebat ini, kunjungi kanal mereka apabila Anda tertarik mengulik hal lain:

-   **[Sandhika Galih (WPU Channel)](https://www.youtube.com/@sandhikagalihWPU)**
-   **[Parsinta](https://www.youtube.com/@parsinta)**
-   **[Kelas Terbuka](https://www.youtube.com/@KelasTerbuka)**
-   **[YeloCode](https://www.youtube.com/@yelocode)**

## License

Proyek Eric Blog adalah proyek open-source yang mengacu pada lisensi MIT [MIT license](LICENSE).
