<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Kedai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- HEADER -->
    <header class="bg-blue-500 text-white pb-6 pt-4 px-4 shadow-md">

        </div>

        <!-- Tombol Aksi Cepat -->
        <div class="mt-5 grid grid-cols-4 gap-3">
            @foreach ([['label' => 'Tambah Pesanan', 'icon' => '+'], ['label' => 'Reservasi', 'icon' => '📅'], ['label' => 'Kasir', 'icon' => '💳'], ['label' => 'Laporan', 'icon' => '📊']] as $action)
                <button
                    class="bg-white/10 backdrop-blur-sm py-3 rounded-lg flex flex-col items-center text-sm hover:bg-white/20 transition">
                    <div class="w-10 h-10 rounded-md bg-white/20 flex items-center justify-center mb-1 text-lg">
                        {{ $action['icon'] }}</div>
                    <div class="text-xs text-center">{{ $action['label'] }}</div>
                </button>
            @endforeach
        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="px-4 -mt-6 pb-24">

        <!-- Banner Promo -->
        <div class="mx-auto max-w-xl">
            <div
                class="bg-gradient-to-r from-yellow-400 to-orange-400 rounded-2xl p-4 shadow-md flex items-center justify-between gap-4">
                <div>
                    <div class="text-sm font-semibold text-white/95">DAPET DISKON & BONUS</div>
                    <div class="text-2xl font-bold text-white">
                        Hingga <span class="text-3xl">50%</span>
                    </div>
                    <button class="mt-2 px-3 py-1 bg-white text-orange-500 rounded-full text-sm font-medium">Serbu
                        Sekarang</button>
                </div>
                <div class="hidden md:block w-28 h-28 bg-white/30 rounded-lg"></div>
            </div>
        </div>

        <!-- Menu Utama -->
        <section class="mt-5 bg-white rounded-lg p-3 shadow-sm">
            <div class="grid grid-cols-4 gap-3">
                @foreach ([['label' => 'Menu Makanan', 'icon' => '🍜'], ['label' => 'Menu Minuman', 'icon' => '🥤'], ['label' => 'Promo & Diskon', 'icon' => '🎉'], ['label' => 'Reservasi', 'icon' => '📅'], ['label' => 'Riwayat Pesanan', 'icon' => '📜'], ['label' => 'Meja Aktif', 'icon' => '🪑'], ['label' => 'Laporan', 'icon' => '📊'], ['label' => 'Lihat Semua', 'icon' => '➕']] as $menu)
                    <div class="flex flex-col items-center text-center p-2 hover:bg-gray-50 rounded-lg transition">
                        <div
                            class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center mb-2 shadow-sm text-xl">
                            {{ $menu['icon'] }}</div>
                        <div class="text-xs">{{ $menu['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Informasi & Promo -->
        <section class="mt-4 space-y-3">
            <div class="bg-white rounded-lg p-3 shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center">🔔</div>
                    <div>
                        <div class="text-sm font-medium">Promo Spesial!</div>
                        <div class="text-xs text-gray-500">Dapatkan diskon 20% untuk menu baru.</div>
                    </div>
                </div>
                <button class="px-3 py-1 border rounded-md text-sm hover:bg-gray-100">Lihat</button>
            </div>

            <div class="bg-white rounded-lg p-3 shadow-sm flex items-center gap-4">
                <div
                    class="w-20 h-12 rounded-lg bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                    Promo</div>
                <div class="flex-1">
                    <div class="font-semibold">Paket Hemat</div>
                    <div class="text-xs text-gray-500">Berlaku 25 Agu - 1 Sep</div>
                </div>
            </div>
        </section>

        <!-- Quick Action Kedai -->
        <section class="mt-4 grid grid-cols-2 gap-3">
            <div class="bg-white rounded-lg p-3 shadow-sm">
                <div class="text-sm font-semibold">Manajemen Meja</div>
                <div class="text-xs text-gray-500 mt-1">Lihat status, lock meja, dan reservasi</div>
            </div>
            <div class="bg-white rounded-lg p-3 shadow-sm">
                <div class="text-sm font-semibold">Pemesanan</div>
                <div class="text-xs text-gray-500 mt-1">Tambah dan kelola pesanan pelanggan</div>
            </div>
        </section>
    </main>

    <!-- Bottom Navigation -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white/90 backdrop-blur-sm border-t shadow-inner">
        <div class="max-w-3xl mx-auto px-4 py-2 flex items-center justify-between">
            <button class="flex flex-col items-center text-xs hover:text-blue-500">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M3 12h18" />
                </svg>
                Beranda
            </button>

            <button class="flex flex-col items-center text-xs hover:text-blue-500">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M3 4h18v16H3z" />
                </svg>
                Pesanan
            </button>

            <!-- Tombol PAY -->
            <div class="-mt-6">
                <button
                    class="w-16 h-16 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-lg">
                    PAY
                </button>
            </div>

            <button class="flex flex-col items-center text-xs hover:text-blue-500">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="2" />
                </svg>
                Dompet
            </button>

            <button class="flex flex-col items-center text-xs hover:text-blue-500">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="3" stroke-width="2" />
                    <path d="M6 20v-1a4 4 0 014-4h4a4 4 0 014 4v1" stroke-width="2" />
                </svg>
                Profil
            </button>
        </div>
    </nav>

</body>

</html>
