# CLearn (Collaborative Learning & Gamified LMS)

Platform Learning Management System (LMS) berbasis web dengan pendekatan gamifikasi dan kolaborasi, yang dirancang khusus untuk pembelajaran pemrograman berorientasi objek (Object-Oriented Programming / OOP Java).

Dokumentasi ini menyajikan analisis dan breakdown komprehensif dari arsitektur sistem saat ini (versi legacy), alur kerja modul, skema basis data, serta pertimbangan teknis untuk mempermudah migrasi ke arsitektur dan tech stack modern.

---

## 1. Ikhtisar Sistem (System Overview)

CLearn adalah aplikasi pembelajaran interaktif yang memadukan manajemen materi kelas konvensional dengan elemen game dan simulasi coding praktis.

### Masalah yang Diselesaikan
- Pembelajaran konsep OOP (Enkapsulasi, Polimorfisme, Pewarisan/Inheritance, Abstract Class, Interface, dan Package) sering kali dirasa abstrak oleh siswa.
- Kebutuhan akan wadah latihan coding langsung tanpa hambatan instalasi local development environment.
- Rendahnya motivasi belajar mandiri yang diatasi melalui mekanisme gamifikasi (XP, level, avatar, badge, dan leaderboard per kelas).

### Aktor Sistem
1. **Guru (Instruktur)**: Mengelola ruang kelas, menyusun capaian kompetensi dasar (KD), menerbitkan modul pembelajaran, membuat bank soal dan kuis interaktif, memantau rekap nilai, serta memoderasi forum diskusi kelas.
2. **Siswa (Peserta Didik)**: Menjelajahi dan mendaftar ke kelas, mempelajari materi perkuliahan/pelajaran, mengerjakan kuis berbatas waktu, berdiskusi di forum, mencoba latihan live coding, memainkan mini-game edukasi, serta bersaing mengumpulkan XP di leaderboard.

---

## 2. Tech Stack Saat Ini (Legacy Stack)

| Lapisan (Layer) | Komponen / Library | Keterangan |
| :--- | :--- | :--- |
| **Backend Framework** | PHP 7.x, CodeIgniter 3 (CI3) | Arsitektur MVC standar dengan integrasi Model, View, Controller native |
| **Database** | MySQL / MariaDB | Relasional database dengan driver `mysqli` dan CodeIgniter Query Builder |
| **Frontend UI** | Bootstrap 4 & 5, Soft UI Dashboard, Tailwind CSS | Templating menggunakan PHP native views yang digabungkan dengan asset utility CSS |
| **Komponen Interaktif** | jQuery, Summernote WYSIWYG, Owl Carousel, AOS | Library manipulasi DOM untuk form editor materi/kuis dan animasi interaktif |
| **Autentikasi** | PHP Session (`CI_Session`), BCrypt Password Hash | Penyimpanan sesi berbasis cookies dan file/database session driver |
| **Praktik Coding** | Iframe Replit | Embed environment Java online untuk pengujian sintaks langsung |
| **Game Edukasi** | Iframe Game Web (HTML5/Canvas) | Mini game eksternal untuk mengenalkan prinsip OOP |

---

## 3. Rincian Modul Sistem (System Modules Breakdown)

### A. Modul Autentikasi dan Manajemen Akun (`Auth.php`, `Reset.php`, `Profil.php`)
- **Registrasi Akun Multi-Peran**: Pendaftaran akun baru dengan validasi unik email dan pemilihan peran awal (Guru / Siswa).
- **Enkripsi Kredensial**: Penyimpanan password menggunakan algoritma hashing `PASSWORD_BCRYPT`.
- **Pengalihan Berdasarkan Peran**: Redireksi dashboard dinamis setelah login sukses sesuai hak akses (`siswa` atau `guru`).
- **Reset Password Berbasis Token**: Permintaan pemulihan akun melalui tautan unik (`hash_key`) yang dikirim ke email dengan masa kedaluwarsa waktu.
- **Kustomisasi Profil dan Avatar**: Pengguna dapat memperbarui data personal, mengubah password, dan memilih karakter avatar visual (`ava1.png` sampai `ava10.png`).

### B. Modul Guru / Instruktur (`Guru.php`)
- **Manajemen Kelas (`course`)**:
  - Membuat kelas baru, mengatur nama kelas, nama instansi/sekolah, dan mengunggah logo kelas.
  - Mengelola daftar siswa terdaftar, termasuk kemampuan mengeluarkan peserta (kick siswa).
  - Mengatur penerbitan sertifikat kelulusan kelas.
- **Penyusunan Kurikulum & Materi (`competencies`, `course_lesson`)**:
  - Pengelompokan materi berdasarkan Kompetensi Dasar (KD).
  - Pembuatan modul pembelajaran menggunakan editor WYSIWYG Summernote.
  - Dukungan lampiran dokumen materi dalam format PDF.
- **Sistem Asesmen & Kuis (`quiz`, `quiz_question`)**:
  - Pembuatan kuis bertarget untuk tiap KD.
  - Bank soal pilihan ganda dengan kunci jawaban, bobot nilai, serta lampiran gambar soal.
  - Pemantauan hasil jawaban siswa (`user_quiz`, `user_answer`) secara real-time.
- **Rekap Nilai Siswa**:
  - Rekapitulasi progres penyelesaian materi dan akumulasi skor kuis siswa per kelas.

### C. Modul Siswa (`Siswa.php`)
- **Pendaftaran Kelas (Enrollment)**:
  - Siswa dapat menelusuri katalog kelas umum ("Cari Kelas") dan bergabung menggunakan kode atau pemilihan langsung.
  - Melihat daftar kelas yang sedang aktif diikuti.
- **Ruang Belajar Mandiri**:
  - Tampilan materi terstruktur per bab / kompetensi.
  - Penandaan status materi yang telah dibaca dan diselesaikan (`user_lesson`).
- **Pengerjaan Kuis Interaktif**:
  - Halaman pengerjaan kuis dengan navigasi soal dan penyimpanan pilihan jawaban.
  - Evaluasi otomatis nilai dan skor perolehan setelah kuis disubmit.
- **Aktivitas dan Sertifikat**:
  - Riwayat aktivitas belajar di kelas (`log`).
  - Akses unduh / pratinjau sertifikat pencapaian setelah menyelesaikan kriteria kelas.

### D. Engine Gamifikasi & Kompetisi (`Course_model.php`)
- **Level & Experience Points (XP)**:
  - Siswa memperoleh poin XP dari aktivitas belajar (menyelesaikan modul, skor kuis, dan keaktifan forum).
  - Level pengguna terikat dengan status tabel `level` yang memicu perubahan karakter maskot (`char0.png` hingga `char5.png`).
- **Lencana Pencapaian (Badges)**:
  - Visual badges (`badge1` sampai `badge5`) sebagai penanda pencapaian milestone pembelajaran.
- **Leaderboard Kelas**:
  - Peringkat 10 besar siswa dengan perolehan skor dan XP tertinggi di setiap ruang kelas untuk membangun dinamika kompetisi yang sehat.

### E. Forum Diskusi & Kolaborasi (`Discussion.php`, `DiscussionGuru.php`)
- **Thread Tanya Jawab**: Pembuatan topik diskusi yang terikat pada masing-masing kelas.
- **Komentar Bertingkat**: Diskusi dua arah antara sesama siswa maupun klarifikasi langsung dari guru.
- **Skor / Upvote Jawaban**: Sistem evaluasi dan apresiasi terhadap jawaban yang bermanfaat (`forum_score`).

### F. Sandbox Latihan Coding & Mini Game Edukasi (`livecode.php`, `gameedu.php`)
- **Live Coding Playground**: Modul tabulasi interaktif yang menyediakan simulasi kode Java berbasis embed Replit untuk topik spesifik:
  1. Enkapsulasi (`Encapsulation`)
  2. Polimorfisme (`Polymorphism`)
  3. Pewarisan (`Inheritance`)
  4. Abstract Class & Interface
  5. Manajemen Package
- **Education Game**: Mini-game interaktif berbasis web untuk memvisualisasikan cara kerja dan paradigma orientasi objek.

---

## 4. Struktur Basis Data (Database Schema)

Berikut adalah entitas utama yang terdapat pada sistem database:

| Nama Tabel | Peran dan Deskripsi |
| :--- | :--- |
| `users` | Menyimpan data akun pengguna (ID, nama, email, password hash, role guru/siswa, avatar, level XP, status reset password). |
| `level` | Konfigurasi batas level gamifikasi dan threshold XP yang dibutuhkan. |
| `course` | Data ruang kelas yang dibuat guru (ID, nama kelas, guru pengampu, deskripsi, logo kelas, template sertifikat). |
| `user_course` | Tabel relasi enrollment siswa di kelas (UserID, CourseID, JoinDate, akumulasi `courseXP`). |
| `competencies` | Struktur kompetensi dasar (KD) atau bab kurikulum dalam suatu kelas. |
| `course_lesson` | Unit materi/modul pembelajaran (judul, isi konten teks/HTML, file PDF lampiran, urutan). |
| `user_lesson` | Catatan progres siswa dalam membaca dan menyelesaikan modul pembelajaran. |
| `quiz` | Informasi kuis (judul kuis, kompetensi terkait, batas waktu pengerjaan). |
| `quiz_question` | Butir soal pilihan ganda (pertanyaan, opsi pilihan A-E, kunci jawaban, skor bobot, lampiran gambar). |
| `user_quiz` | Hasil evaluasi kuis siswa (skor total, status kelulusan, tanggal pengerjaan). |
| `user_answer` | Rekam jejak jawaban spesifik yang dipilih siswa pada setiap butir soal kuis. |
| `forum_question` | Topik pertanyaan yang diajukan di forum diskusi kelas. |
| `forum_answer` | Jawaban dan tanggapan pada topik diskusi. |
| `forum_score` | Poin apresiasi (upvote) untuk jawaban diskusi. |
| `log` | Log pencatatan aktivitas pengguna di dalam sistem untuk kebutuhan audit dan pemantauan guru. |

---

## 5. Struktur Direktori Proyek

```text
clearn/
├── application/
│   ├── config/            # Konfigurasi database, rute URL, session, autoload
│   ├── controllers/       # Controller MVC (Auth, Guru, Siswa, Discussion, Lesson, Quiz, Reset)
│   ├── models/            # Akses query basis data (Course_model, M_Auth, M_Quiz, M_Discussion)
│   └── views/             # Template antarmuka (landing, auth, guru, siswa, profil)
├── assets/
│   ├── badge/             # Aset gambar lencana pencapaian gamifikasi
│   ├── character/         # Aset karakter bertingkat berdasarkan level siswa
│   ├── clearn/            # Logo dan ilustrasi grafis platform
│   ├── css/               # Stylesheet (Soft UI Dashboard, user custom, style forum)
│   ├── img/               # Vektor ilustrasi konsep OOP dan ikon antarmuka
│   ├── landing/           # Aset visual halaman publik beranda
│   ├── lesson/            # Direktori penyimpanan berkas modul (PDF)
│   └── summernote/        # Library editor rich-text WYSIWYG
├── media/
│   ├── avatar/            # Pilihan avatar profil pengguna
│   └── soal/              # Lampiran gambar butir soal kuis
├── system/                # Core library bawaan CodeIgniter 3
├── index.php              # Entry point utama aplikasi
└── README.md              # Dokumentasi arsitektur dan sistem
```

---

## 6. Evaluasi Teknis & Catatan Refactoring (Technical Debt)

Proyek ini telah memiliki fungsionalitas inti yang solid, namun memiliki beberapa keterbatasan arsitektural khas monolitik legacy yang perlu ditingkatkan saat migrasi ke tech stack baru:

1. **Tight Coupling Antara Logic dan View**:
   - Logika bisnis, query data, dan rendering markup HTML terikat erat di dalam template PHP native (`.php` views).
   - Solusi modern: Memisahkan backend menjadi REST API atau GraphQL yang stateless, dikonsumsi oleh frontend modern berbasis komponen (React / Next.js / Vue).
2. **Ketergantungan Eksternal untuk Live Coding**:
   - Eksekusi kode mengandalkan embed iframe Replit yang rentan terhadap perubahan URL eksternal, latensi, dan keterbatasan integrasi nilai ke database.
   - Solusi modern: Menggunakan code runner backend terisolasi (misalnya Judge0 API, Piston, atau Docker sandbox) dengan frontend editor Monaco (VS Code engine).
3. **Fragmentasi Styling Antarmuka**:
   - Terdapat tumpang-tindih antara CSS bawaan Bootstrap 4, Soft UI dashboard, dan build awal Tailwind CSS.
   - Solusi modern: Standardisasi penuh ke satu design system (contoh: Tailwind CSS dengan komponen headless seperti Radix UI / shadcn/ui).
4. **Mekanisme State & Keamanan Autentikasi**:
   - Sistem saat ini mengandalkan stateful PHP session cookies tradisional.
   - Solusi modern: Autentikasi berbasis JWT dengan token refresh atau solusi terkelola seperti NextAuth / Supabase Auth / Clerk, dilengkapi middleware proteksi rute berbasis peran (Role-based Guard).
5. **Real-time Gamifikasi & Diskusi**:
   - Pembaruan papan peringkat dan forum saat ini membutuhkan reload halaman penuh.
   - Solusi modern: Menggunakan WebSocket (Socket.io) atau database event streaming untuk pembaruan skor, notifikasi, dan forum interaktif langsung.

---

## 7. Rekomendasi Arsitektur Tech Stack Baru

Untuk pembaruan sistem ke standar modern, berikut beberapa opsi arsitektur yang sangat disarankan:

### Rekomendasi 1: Modern Fullstack TypeScript (Ekosistem Next.js)
- **Frontend & Fullstack**: Next.js 14+ (App Router, Server Components, Server Actions).
- **Styling**: Tailwind CSS + shadcn/ui (komponen elegan, fleksibel, dan aksesibel).
- **Database & ORM**: PostgreSQL + Prisma ORM atau Drizzle ORM (type-safe query dan migrasi terkelola).
- **Code Execution**: Integrasi Monaco Editor dengan backend worker Judge0 / isolated runner.
- **Autentikasi**: NextAuth.js (Auth.js) atau Supabase Auth dengan otentikasi peran ketat.

### Rekomendasi 2: Decoupled Service (FastAPI / NestJS + SPA)
- **Backend**: NestJS (TypeScript) atau Go / FastAPI (Python) yang menyediakan clean architecture, validation pipe, dan dokumentasi OpenAPI Swagger otomatis.
- **Frontend**: React (Vite) atau Vue 3 (Nuxt 3) dengan state management terpusat.
- **Cache & Real-time**: Redis untuk cache leaderboard kilat dan WebSocket gateway untuk notifikasi interaktif.

---

## 8. Panduan Menjalankan Secara Lokal (Local Setup - Legacy CI3)

Apabila ingin menjalankan versi CodeIgniter 3 ini secara lokal:

1. **Prasyarat**:
   - Web server lokal (XAMPP / Laragon / LAMP stack).
   - PHP versi 7.2 hingga 7.4.
   - Database MySQL / MariaDB.
2. **Konfigurasi Basis Data**:
   - Buat database baru bernama `clearn` di MySQL (melalui phpMyAdmin atau CLI).
   - Import skema dan data awal jika tersedia.
   - Sesuaikan konfigurasi koneksi pada file `application/config/database.php`:
     ```php
     'hostname' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'clearn',
     ```
3. **Konfigurasi Base URL**:
   - Pastikan URL basis di `application/config/config.php` sesuai dengan direktori server lokal:
     ```php
     $config['base_url'] = 'http://localhost/clearn/';
     ```
4. **Akses Aplikasi**:
   - Buka browser dan arahkan ke alamat `http://localhost/clearn/`.

---

## Lisensi & Atribusi

Proyek ini dikembangkan sebagai media pembelajaran dan kolaborasi pemrograman interaktif. Seluruh aset grafis dan library pihak ketiga dilindungi hak cipta masing-masing pemilik lisensi.
