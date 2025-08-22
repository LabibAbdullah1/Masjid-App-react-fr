<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Al-Falah</title>

    {{-- logo --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('/favicon1.svg') }}">

    <!-- Tailwind CDN -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <script src="https://unpkg.com/alpinejs" defer></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans antialiased text-black bg-cover bg-center bg-fixed bg-no-repeat"
    style="background-image: url('{{ asset('images/masjid-bg.jpg') }}');">

    {{-- mian --}}
    <section class=" min-h-screen flex flex-col">
        {{-- Overlay --}}
        <div class="overlay flex flex-col flex-1" id="beranda">
            {{-- Navbar --}}
            <nav
                class=" bg-green-800/70 backdrop-blur-lg shadow-xl p-4 flex justify-between items-center fixed w-full top-0 z-20 transition-all duration-300 transform translate-y-0">
                <div class="flex items-center">
                    <span class="text-xl font-extrabold md:text-3xl text-yellow-300 dark:text-yellow-400 font-serif">
                        Masjid Al-Falah
                    </span>
                </div>
                {{-- Desktop Menu Start --}}
                <div class="hidden md:flex space-x-6 z-10 font-bold">
                    <a href="#beranda"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Beranda</a>
                    <a href="#tentang"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Tentang</a>
                    <a href="#kegiatan"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Kegiatan</a>
                    <a href="#kontak"
                        class="text-white hover:text-yellow-400 transition-colors duration-300 ease-in-out transform hover:scale-110">Kontak</a>
                </div>
                {{-- Desktop menu End --}}
                {{-- Mobile Tombol menu  --}}
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
                {{-- Mobile Tombol Menu End --}}
            </nav>

            {{-- Mobile Menu Dropdown Start --}}
            <div id="mobile-menu"
                class="hidden md:hidden bg-green-800/70 backdrop-blur-lg shadow-xl p-4 space-y-4 fixed w-full top-16 z-[40]">
                <a href="#beranda"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Beranda</a>
                <a href="#tentang"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Tentang</a>
                <a href="#kegiatan"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Kegiatan</a>
                <a href="#kontak"
                    class="block text-center text-white hover:bg-green-700 p-2 rounded-md transition-colors font-bold text-lg">Kontak</a>
            </div>
            {{-- Mobile Menu Dropdown End --}}
            {{-- End Navbar --}}

            {{-- Hero Content Start--}}
            <div class="flex-1 flex flex-col justify-center items-center text-center px-6 " data-aos="fade-up"
                data-aos-delay="300">
                <h2 class="text-4xl md:text-6xl font-extrabold mb-4 text-yellow-300 drop-shadow-lg">
                    Selamat Datang di Masjid Al-Falah
                </h2>
                <p class="max-w-2xl text-lg md:text-xl text-black ">
                    Masjid Al-Falah adalah pusat ibadah, pembelajaran, dan kebersamaan umat Islam.
                    Bergabunglah dengan kami dalam kegiatan keagamaan dan sosial.
                </p>
                <div class="mt-6 flex gap-4" data-aos="fade-up" data-aos-delay="500">
                    @auth
                        {{-- Kalau user sudah login --}}
                        <a href="{{ route('dashboard') }}"
                            class="px-5 py-3 bg-yellow-500 text-gray-900 font-semibold rounded-lg shadow hover:bg-yellow-400 transition">
                            Dashboard
                        </a>
                    @endauth

                    @guest
                        {{-- Kalau user belum login --}}
                        <a href="{{ route('login') }}"
                            class="px-5 py-3 bg-yellow-300 text-gray-900 font-semibold rounded-lg shadow hover:bg-yellow-400 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-3 bg-transparent border border-yellow-300 text-yellow-300 font-semibold rounded-lg shadow hover:bg-yellow-300 hover:text-gray-900 transition">
                            Register
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    {{-- Tentang --}}
    <section id="tentang" class="bg-white/50 text-gray-800 py-20 px-6 md:px-16 fade-in-up">
        <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
            {{-- Masjid --}}
            <h3 class="text-4xl font-bold mb-8 text-green-700">Tentang Masjid</h3>
            <p class="leading-relaxed text-lg mb-6">
                Masjid <span class="font-semibold">Al-Falah</span> berdiri sejak tahun 1980 dan telah menjadi pusat
                peribadatan, pembinaan akhlak, serta kegiatan sosial keagamaan masyarakat sekitar. Dengan semangat
                kebersamaan, masjid ini berperan aktif dalam mendukung terciptanya lingkungan yang islami, damai, dan
                penuh dengan nilai ukhuwah Islamiyah.
            </p>
            <p class="leading-relaxed text-lg mb-6">
                Selain sebagai tempat ibadah, Masjid Al-Falah juga menjadi pusat pendidikan Islam melalui berbagai
                program,
                seperti Taman Pendidikan Al-Qur'an (TPA), pelatihan keterampilan, dan pemberdayaan ekonomi umat. Kami
                berkomitmen untuk melahirkan generasi Qur'ani yang berilmu, berakhlak mulia, dan peduli terhadap sesama.
            </p>
            <div class="grid md:grid-cols-2 gap-6 mt-10 text-left">
                {{-- Visi --}}
                <div class="bg-green-50 p-6 rounded-xl shadow">
                    <h4 class="text-2xl font-semibold mb-3 text-green-700">Visi</h4>
                    <p>Menjadi masjid yang makmur, aktif, dan bermanfaat bagi masyarakat dalam membangun ukhuwah
                        Islamiyah dan meningkatkan kualitas iman, ilmu, dan amal.</p>
                </div>
                {{-- Misi --}}
                <div class="bg-green-50 p-6 rounded-xl shadow">
                    <h4 class="text-2xl font-semibold mb-3 text-green-700">Misi</h4>
                    <ul class="list-disc pl-5 space-y-2">
                        <li>Meningkatkan kualitas ibadah jamaah melalui kajian dan bimbingan rohani.</li>
                        <li>Menjadi pusat pendidikan Al-Qur’an dan ilmu keislaman.</li>
                        <li>Mendorong kegiatan sosial untuk mempererat ukhuwah antarwarga.</li>
                        <li>Menyelenggarakan program pemberdayaan ekonomi umat.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Kegiatan --}}
    <section id="kegiatan" class="bg-green-50/50 py-20 px-6 md:px-16 fade-in-up">
        <div class="max-w-6xl mx-auto" data-aos="fade-up">
            <h3 class="text-4xl font-bold mb-10 text-green-700 text-center">Kegiatan Masjid</h3>
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Kajian --}}
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Kajian Rutin</h4>
                    <p>Kajian tafsir Al-Qur’an, hadits, dan fiqih setiap pekan bersama ustadz dan ulama terpercaya.</p>
                </div>
                {{-- TPA --}}
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Taman Pendidikan Al-Qur'an</h4>
                    <p>Program pembelajaran Al-Qur’an untuk anak-anak, remaja, hingga dewasa dengan metode interaktif.
                    </p>
                </div>
                {{-- Bakti Sosial --}}
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Bakti Sosial</h4>
                    <p>Pembagian sembako, santunan anak yatim, serta bantuan bagi masyarakat kurang mampu.</p>
                </div>
                {{-- Pelatihan --}}
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Pelatihan & Seminar</h4>
                    <p>Kegiatan pelatihan keterampilan, seminar keislaman, serta edukasi kesehatan masyarakat.</p>
                </div>
                {{-- Remaja Masjid --}}
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Remaja Masjid</h4>
                    <p>Kegiatan kepemudaan, diskusi, serta olahraga untuk membina generasi muda islami yang aktif.</p>
                </div>
                {{-- Program Ramadhan --}}
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2 text-green-600">Program Ramadhan</h4>
                    <p>Pesantren kilat, buka puasa bersama, dan pembagian zakat fitrah setiap bulan suci Ramadhan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Kontak --}}
    <section id="kontak" class="bg-white/50 text-gray-800 py-20 px-6 md:px-16 fade-in-up">
        <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
            <h3 class="text-4xl font-bold mb-8 text-green-700">Kontak</h3>
            <p class="mb-6 text-lg">
                Hubungi kami untuk informasi lebih lanjut, pendaftaran kegiatan, atau sampaikan aspirasi Anda.
            </p>
            <div class="grid md:grid-cols-2 gap-10 mt-8 text-left">
                {{-- Info Kontak --}}
                <div class="bg-green-50 p-6 rounded-xl shadow">
                    <h4 class="text-2xl font-semibold mb-3 text-green-700">Informasi Kontak</h4>
                    <p><strong>Alamat:</strong> Jl. Melati No. 123, Pekanbaru Riau</p>
                    <p><strong>Telepon:</strong> (022) 1234567</p>
                    <p><strong>Email:</strong> info@masjidal-falah.or.id</p>
                    <p><strong>Jam Operasional:</strong> Setiap hari, 04.30 - 21.00 WIB</p>
                </div>

                {{-- Form Kontak --}}
                <div class="bg-green-50 p-6 rounded-xl shadow">
                    <h4 class="text-2xl font-semibold mb-3 text-green-700">Kirim Pesan</h4>
                    {{-- Login / Buat pesan  --}}
                    <form action="{{ auth()->check() ? route('umum.pesan.create') : route('login') }}" method="GET"
                        class="space-y-4">
                        <div>
                            <label class="block font-semibold mb-1">Nama</label>
                            <input type="text" name="nama" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Email</label>
                            <input type="email" name="email" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Pesan</label>
                            <textarea name="pesan" rows="4" required
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"></textarea>
                        </div>
                        <button type="submit"
                            class="px-5 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transition w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer class="bg-green-900 text-gray-200 py-6 text-center">
        &copy; {{ date('Y') }} Masjid Al-Falah. Semua Hak Dilindungi.
    </footer>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // durasi animasi dalam ms
            easing: 'ease-out', // tipe easing
            once: true,
            mirror: true
        });

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
