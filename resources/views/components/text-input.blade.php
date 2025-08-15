@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'h-10 border-green-400 bg-white text-gray-800
                                focus:border-green-600 focus:ring-green-500 py-3 px-2 border border-green-400
                                dark:border-green-600 dark:bg-green-900 dark:text-white dark:placeholder-gray-300
                                rounded-md shadow-sm',
    ]) }}>
