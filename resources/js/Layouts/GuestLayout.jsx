import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';

export default function GuestLayout({ children }) {
    return (
        <div className="flex min-h-screen flex-col items-center bg-background-light dark:bg-background-dark pt-6 sm:justify-center sm:pt-0">

            <div className="mt-6 w-full overflow-hidden bg-card-light dark:bg-card-dark px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
                {children}
            </div>
        </div>
    );
}
