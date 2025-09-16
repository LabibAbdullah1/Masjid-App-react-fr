import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";

export default function Welcome() {
    const { props } = usePage();
    const user = props.auth?.user; // data user dari Laravel Jetstream
    const [menuOpen, setMenuOpen] = useState(false);

    return (
        <div
            className="font-sans antialiased text-black bg-background-light dark:bg-background-dark"
        >
            {/* Navbar */}
            <nav className="bg-navbar-light dark:bg-navbar-dark backdrop-blur-lg shadow-xl p-4 flex justify-between items-center fixed w-full top-0 z-20 transition-all duration-300">
                <div className="flex items-center">
                    <span className="text-xl font-extrabold md:text-3xl text-text-primaryLight dark:text-text-primaryDark font-serif">
                        Masjid Al-Falah
                    </span>
                </div>

                {/* Desktop Menu */}
                <div className="hidden md:flex space-x-6 z-10 font-bold">
                    <a href="#beranda" className='text-text-primaryLight dark:text-text-primaryDark transition'>
                        Beranda
                    </a>
                    <a href="#tentang" className="text-text-primaryLight dark:text-text-primaryDark transition">
                        Tentang
                    </a>
                    <a href="#kegiatan" className="text-text-primaryLight dark:text-text-primaryDark transition">
                        Kegiatan
                    </a>
                    <a href="#kontak" className="text-text-primaryLight dark:text-text-primaryDark transition">
                        Kontak
                    </a>
                </div>

                {/* Mobile Menu Button */}
                <div className="md:hidden">
                    <button onClick={() => setMenuOpen(!menuOpen)} className="text-text-primaryLight">
                        <svg className="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </nav>

            {/* Mobile Menu */}
            {menuOpen && (
                <div className="md:hidden bg-navbar-light/70 dark:bg-navbar-dark/70 backdrop-blur-lg shadow-xl p-4 space-y-4 fixed w-full top-16 z-[40]">
                    {["beranda", "tentang", "kegiatan", "kontak"].map((item) => (
                        <a
                            key={item}
                            href={`#${item}`}
                            onClick={() => setMenuOpen(false)}
                            className="block text-center text-text-primaryLight dark:text-text-primaryDark p-2 rounded-md font-bold text-lg"
                        >
                            {item.charAt(0).toUpperCase() + item.slice(1)}
                        </a>
                    ))}
                </div>
            )}

            {/* Hero */}
            <section id="beranda" className="flex-1 flex flex-col justify-center items-center text-center px-6 min-h-screen">
                <h2 className="text-4xl md:text-6xl font-extrabold mb-4 text-text-primaryLight dark:text-text-primaryDark drop-shadow-lg">
                    Selamat Datang di <span className="text-primary-light">Masjid Al-Falah</span>
                </h2>
                <p className="max-w-2xl text-lg md:text-xl text-text-secondaryLight dark:text-text-secondaryDark">
                    Masjid Al-Falah adalah pusat ibadah, pembelajaran, dan kebersamaan umat Islam.
                </p>

                <div className="mt-6 flex gap-4">
                    {user ? (
                        <Link
                            href={route("dashboard")}
                            className="px-5 py-3 bg-primary-light text-gray-900 font-semibold rounded-lg shadow hover:bg-primary-hover transition"
                        >
                            Dashboard
                        </Link>
                    ) : (
                        <>
                            <Link
                                href={route("login")}
                                className="px-5 py-3 bg-primary-light text-text-primaryLight dark:text-text-primaryDark font-semibold rounded-lg shadow  transition"
                            >
                                Login
                            </Link>
                            <Link
                                href={route("register")}
                                className="px-5 py-3 bg-transparent border border-primary-light text-text-primaryLight dark:text-text-primaryDark font-semibold rounded-lg shadow hover:bg-primary-light transition"
                            >
                                Register
                            </Link>
                        </>
                    )}
                </div>
            </section>

            {/* Footer */}
            <footer className="bg-navbar-light dark:bg-navbar-dark text-text-primaryLight dark:text-text-primaryDark py-6 text-center">
                &copy; {new Date().getFullYear()} Masjid Al-Falah. Semua Hak Dilindungi.
            </footer>
        </div>
    );
}
