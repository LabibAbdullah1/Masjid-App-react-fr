@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-2 sm:px-3 md:px-4 pt-1 border-b-2 border-yellow-400 text-sm sm:text-base md:text-md font-semibold leading-5 text-white bg-green-700 dark:bg-green-900 focus:outline-none focus:border-yellow-500 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-2 sm:px-3 md:px-4 pt-1 border-b-2 border-transparent text-sm sm:text-base md:text-md font-medium leading-5 text-green-100 dark:text-green-200 hover:text-yellow-300 dark:hover:text-yellow-400 hover:border-yellow-300 dark:hover:border-yellow-400 focus:outline-none focus:text-yellow-300 dark:focus:text-yellow-400 focus:border-yellow-300 dark:focus:border-yellow-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
