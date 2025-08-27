<div id="global-loading"
    class="hidden fixed inset-0 bg-gradient-to-br from-green-100 via-white to-green-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 flex flex-col items-center justify-center z-[9999] transition-opacity duration-300">
    <!-- Konten Loading -->
    <div class="flex flex-col items-center space-y-6 animate-fade-in">
        <!-- SVG Masjid -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
            class="w-20 h-20 text-green-600 animate-bounce drop-shadow-lg">
            <path fill="currentColor"
                d="M320 32c17.7 0 32 14.3 32 32v16h48V80c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v32h32c17.7 0 32 14.3 32 32v32h-64V144c0-8.8-7.2-16-16-16h-64c-8.8 0-16 7.2-16 16v32H256V144c0-8.8-7.2-16-16-16h-64c-8.8 0-16 7.2-16 16v32H96V144c0-17.7 14.3-32 32-32h32V80c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v0h48V64c0-17.7 14.3-32 32-32zM64 480V352H32c-17.7 0-32-14.3-32-32V208c0-17.7 14.3-32 32-32H608c17.7 0 32 14.3 32 32V320c0 17.7-14.3 32-32 32H576V480H448V352H192V480H64z" />
        </svg>

        <!-- Teks Loading -->
        <p id="loading-text" class="text-xl font-bold text-green-700 dark:text-green-400 tracking-wide animate-pulse">
            Memuat...
        </p>

        <!-- Progress Bar -->
        <div class="w-64 h-3 bg-green-200 rounded-full overflow-hidden shadow-inner">
            <div id="loading-bar" class="h-full bg-green-600 transition-all duration-300 ease-out" style="width: 0%">
            </div>
        </div>
    </div>
</div>
