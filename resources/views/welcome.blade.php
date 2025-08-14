<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Al-Falah</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased text-black bg-cover bg-center bg-fixed bg-no-repeat"
    style="background-image: url('{{ asset('images/masjid-bg.jpg') }}');">

    <!-- Hero dengan parallax -->
    <section class=" min-h-screen flex flex-col">
        <!-- Overlay -->
        <div class="overlay flex flex-col flex-1">
            <!-- Navbar -->
            <nav
                class=" bg-green-800/70 backdrop-blur-lg shadow-xl p-4 flex justify-between items-center fixed w-full top-0 z-20 transition-all duration-300 transform translate-y-0">
                <div class="flex items-center">
                    <span class="text-xl font-extrabold md:text-3xl text-yellow-300 dark:text-yellow-400 font-serif">
                        Masjid Al-Falah
                    </span>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6 z-10 font-bold">
                    <a href="#main"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Beranda</a>
                    <a href="#kegiatan"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Kegiatan</a>
                    <a href="#kontak"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Kontak</a>
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="menu-button" class="text-white focus:outline-none transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7">
                            </path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu"
                class="hidden md:hidden bg-green-800/70 backdrop-blur-lg shadow-xl p-4 space-y-4 fixed w-full top-16 z-[40]">
                <a href="#main"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Beranda</a>
                <a href="#kegiatan"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Kegiatan</a>
                <a href="#kontak"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Kontak</a>
            </div>
            <!-- End Navbar -->

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

    <script>
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            // Toggle class 'hidden' untuk menampilkan atau menyembunyikan menu
            mobileMenu.classList.toggle('hidden');
        });

        // Tutup menu saat link diklik
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    </script>
</body>

</html>
