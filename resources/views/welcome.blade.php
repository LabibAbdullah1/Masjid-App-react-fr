<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Al-Falah</title>
    @vite('resources/css/app.css')
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        /* Parallax background */
        .parallax {
            background-image: url('{{ asset('images/masjid-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="font-sans antialiased text-black parallax ">

    <!-- Hero dengan parallax -->
    <section class=" min-h-screen flex flex-col">
        <!-- Overlay -->
        <div class="overlay flex flex-col flex-1">
            <!-- Navbar -->
            <nav class="flex justify-between items-center px-8 py-4 bg-white/10 backdrop-blur-sm shadow-md">
                <h1 class="text-2xl font-bold text-yellow-300">Masjid Al-Falah</h1>
                <ul class="flex gap-6 text-sm">
                    <li><a href="#tentang" class="hover:text-yellow-300 transition">Tentang</a></li>
                    <li><a href="#kegiatan" class="hover:text-yellow-300 transition">Kegiatan</a></li>
                    <li><a href="#kontak" class="hover:text-yellow-300 transition">Kontak</a></li>
                </ul>
            </nav>

            <!-- Hero Content -->
            <div class="flex-1 flex flex-col justify-center items-center text-center px-6 fade-in-up">
                <h2 class="text-4xl md:text-6xl font-extrabold mb-4 text-yellow-300 drop-shadow-lg">
                    Selamat Datang di Masjid Al-Falah
                </h2>
                <p class="max-w-2xl text-lg md:text-xl text-black ">
                    Masjid Al-Falah adalah pusat ibadah, pembelajaran, dan kebersamaan umat Islam.
                    Bergabunglah dengan kami dalam kegiatan keagamaan dan sosial.
                </p>
                <div class="mt-6 flex gap-4">
                    <a href="{{ route('login') }}"
                        class="px-5 py-3 bg-yellow-300 text-gray-900 font-semibold rounded-lg shadow hover:bg-yellow-400 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-3 bg-transparent border border-yellow-300 text-yellow-300 font-semibold rounded-lg shadow hover:bg-yellow-300 hover:text-gray-900 transition">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="bg-white/50 text-gray-800 py-16 px-6 md:px-16 fade-in-up">
        <div class="max-w-5xl mx-auto text-center">
            <h3 class="text-3xl font-bold mb-6 text-green-700">Tentang Masjid</h3>
            <p class="leading-relaxed">
                Masjid Al-Falah telah berdiri sejak tahun 1980, menjadi pusat kegiatan keagamaan, sosial, dan pendidikan
                Islam
                bagi masyarakat sekitar. Kami berkomitmen untuk membangun ukhuwah Islamiyah yang kuat melalui berbagai
                program dan kegiatan yang bermanfaat.
            </p>
        </div>
    </section>

    <!-- Kegiatan -->
    <section id="kegiatan" class="bg-green-50/50 py-16 px-6 md:px-16 fade-in-up ">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-bold mb-8 text-green-700 text-center">Kegiatan Masjid</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Kajian Rutin</h4>
                    <p>Kajian setiap malam Jumat membahas tafsir Al-Qur'an dan hadits bersama ustadz ternama.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Taman Pendidikan Al-Qur'an</h4>
                    <p>Program belajar membaca dan memahami Al-Qur'an untuk anak-anak dan remaja.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Bakti Sosial</h4>
                    <p>Kegiatan berbagi sembako dan bantuan untuk warga yang membutuhkan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="kontak" class="bg-white/50 text-gray-800 py-16 px-6 md:px-16 fade-in-up">
        <div class="max-w-4xl mx-auto text-center">
            <h3 class="text-3xl font-bold mb-6 text-green-700">Kontak</h3>
            <p class="mb-4">Hubungi kami untuk informasi lebih lanjut atau bergabung dalam kegiatan masjid.</p>
            <a href="mailto:info@masjidalfalah.com"
                class="px-5 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition">
                Email Kami
            </a>
        </div>
    </section>

    <footer class="bg-green-900 text-gray-200 py-6 text-center">
        &copy; {{ date('Y') }} Masjid Al-Falah. Semua Hak Dilindungi.
    </footer>


</body>

</html>
