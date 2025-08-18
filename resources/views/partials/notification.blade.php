<div x-data="{ ...Alpine.store('notification') }" x-cloak class="fixed inset-0 flex items-center justify-center z-50 pointer-events-none">

    <!-- Overlay -->
    <div x-show="show" x-transition.opacity class="absolute inset-0 bg-black bg-opacity-30"></div>

    <!-- Notifikasi Box -->
    <div x-show="show" x-transition.origin.top.duration.500ms
        class="relative bg-white rounded-lg shadow-lg p-6 w-80 flex flex-col items-center space-y-4 pointer-events-auto"
        :class="status === 'success' ? 'border-green-500' : 'border-red-500'" class="border-2">

        <!-- Ikon -->
        <div class="text-4xl">
            <template x-if="status === 'success'">
                <span class="text-green-500 animate-bounce">✔️</span>
            </template>
            <template x-if="status === 'error'">
                <span class="text-red-500 animate-bounce">❌</span>
            </template>
        </div>

        <!-- Pesan -->
        <div class="text-center font-semibold text-gray-800" x-text="message"></div>

        <!-- Tombol Tutup -->
        <button @click="hide()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
            Tutup
        </button>
    </div>
</div>
