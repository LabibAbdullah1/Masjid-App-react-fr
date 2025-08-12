@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-2 bg-green-50 border border-green-200 rounded-lg shadow-lg',
])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

<div class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.outside="open = false">
    {{-- Trigger --}}
    <div @click="open = ! open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    {{-- Dropdown Menu --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="absolute z-50 mt-2 {{ $width }} rounded-lg shadow-lg {{ $alignmentClasses }}"
        style="display: none;">
        <div class="{{ $contentClasses }}">
            {{-- Ornamen tema masjid --}}
            <div
                class="px-4 py-2 text-center text-green-800 font-semibold border-b border-green-200 bg-green-100 rounded-t-lg">
                🕌 Menu Masjid
            </div>

            {{ $content }}

            <div
                class="px-4 py-2 text-xs text-green-600 border-t border-green-200 bg-green-50 rounded-b-lg text-center">
                السلام عليكم ورحمة الله
            </div>
        </div>
    </div>
</div>
