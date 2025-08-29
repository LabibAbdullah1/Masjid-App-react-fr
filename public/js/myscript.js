


// aos
document.addEventListener("DOMContentLoaded", function () {
    // Kunci unik per halaman (berdasarkan URL path)
    const pageKey = "aosPlayed_" + window.location.pathname;

    // Cek apakah di halaman ini AOS sudah pernah dijalankan
    if (sessionStorage.getItem(pageKey)) {
        // Jika sudah, hapus semua animasi AOS
        document.querySelectorAll("[data-aos]").forEach(function (el) {
            el.removeAttribute("data-aos");
        });
    } else {
        // Jika belum → jalankan AOS
        AOS.init({
            once: true,
            duration: 800,
            easing: "ease-in-out",
        });

        // Simpan status AOS untuk halaman ini
        sessionStorage.setItem(pageKey, "true");
    }
});

// Reset AOS ketika pindah halaman
document.addEventListener("click", function (e) {
    const link = e.target.closest("a");
    if (link && link.href && link.origin === window.location.origin) {
        // Hanya reset ketika pindah halaman internal, bukan refresh
        Object.keys(sessionStorage).forEach(function (key) {
            if (key.startsWith("aosPlayed_")) {
                sessionStorage.removeItem(key);
            }
        });
    }
});

// animasi countup  angka
function counter(target) {
    return {
        count: 0,
        target: target,
        start() {
            const step = Math.ceil(this.target / 100); // penambahan tiap frame
            const update = () => {
                if (this.count < this.target) {
                    this.count += step;
                    if (this.count > this.target) this.count = this.target;
                    requestAnimationFrame(update);
                }
            }
            update();
        },
        displayCount() {
            return this.count.toLocaleString(); // format ribuan
        }
    }
}

//animasi angka countdown
document.addEventListener('alpine:init', () => {
    Alpine.data('countdown', (target) => ({
        targetDate: new Date(target).getTime(),
        display: '',
        start() {
            this.update();
            setInterval(() => this.update(), 1000);
        },
        update() {
            const now = new Date().getTime();
            const distance = this.targetDate - now;

            if (distance <= 0) {
                this.display = 'Selesai';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            this.display =
                (days > 0 ? days + 'h ' : '') +
                hours + 'j ' +
                minutes + 'm ' +
                seconds + 'd';
        }
    }))
})

document.addEventListener('alpine:init', () => {
    Alpine.store('notification', {
        show: false,
        message: '',
        status: 'success', // 'success' atau 'error'

        // Tampilkan notifikasi sukses
        showSuccess(msg, autoHide = true, duration = 3000) {
            this.message = msg;
            this.status = 'success';
            this.show = true;
            if (autoHide) {
                setTimeout(() => this.hide(), duration);
            }
        },

        // Tampilkan notifikasi error
        showError(msg, autoHide = false, duration = 3000) {
            this.message = msg;
            this.status = 'error';
            this.show = true;
            if (autoHide) {
                setTimeout(() => this.hide(), duration);
            }
        },

        // Tutup notifikasi
        hide() {
            this.show = false
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.getElementById('logout-button');
    const logoutModal = document.getElementById('logout-modal');
    const confirmLogout = document.getElementById('confirm-logout');
    const cancelLogout = document.getElementById('cancel-logout');
    const logoutForm = document.getElementById('logout-form');

    // Saat klik tombol logout → tampilkan modal
    logoutButton.addEventListener('click', function (e) {
        e.preventDefault();
        logoutModal.classList.remove('hidden');
        logoutModal.classList.add('flex');
    });

    // Tombol batal → tutup modal
    cancelLogout.addEventListener('click', function () {
        logoutModal.classList.add('hidden');
        logoutModal.classList.remove('flex');
    });

    // Tombol konfirmasi → submit form POST logout
    confirmLogout.addEventListener('click', function () {
        logoutForm.submit();
    });

    // Klik di luar modal → tutup modal
    window.addEventListener('click', function (e) {
        if (e.target === logoutModal) {
            logoutModal.classList.add('hidden');
            logoutModal.classList.remove('flex');
        }
    });

    // Tekan ESC → tutup modal
    window.addEventListener('keydown', function (e) {
        if (e.key === "Escape") {
            logoutModal.classList.add('hidden');
            logoutModal.classList.remove('flex');
        }
    });
});

