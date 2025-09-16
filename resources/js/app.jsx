import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot, hydrateRoot } from 'react-dom/client';
import { ThemeProvider } from './Providers/ThemeProvider';
import ThemeToggle from './Components/ThemeToggle';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ),
    setup({ el, App, props }) {
        const Root = (
            <ThemeProvider>
                <App {...props} />
                <ThemeToggle />
            </ThemeProvider>
        );

        if (import.meta.env.SSR) {
            hydrateRoot(el, Root);
        } else {
            createRoot(el).render(Root);
        }
    },
    progress: {
        color: '#2E9D27',
    },
});
