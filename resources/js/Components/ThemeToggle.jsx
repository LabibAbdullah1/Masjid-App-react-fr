import { Moon, Sun } from "lucide-react";
import useDarkMode from "@/Hooks/useDarkMode";

export default function ThemeToggle() {
    const { theme, toggleTheme } = useDarkMode();

    return (
        <button
            onClick={toggleTheme}
            className="fixed bottom-4 right-4 p-3 rounded-full shadow-lg
                       transition-colors duration-300
                       bg-gray-200 dark:bg-gray-700
                       hover:bg-gray-300 dark:hover:bg-gray-600"
        >
            {theme === "dark" ? (
                <Sun className="h-5 w-5 text-yellow-400" />
            ) : (
                <Moon className="h-5 w-5 text-gray-800" />
            )}
        </button>
    );
}
