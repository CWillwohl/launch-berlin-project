@props([
    'title' => 'Title',
    'size' => 'w-auto',
])

<div class="{{ $size }} h-auto bg-white/5 hover:bg-white/10 duration-300 border-4 border-white/20 rounded-lg shadow-lg shadow-white/5">
    <div class="w-full bg-gradient-to-b from-blue-500/50 to-blue-500/30 text-white p-4 font-bold rounded">
        {{ $title }}
    </div>
    <div class="p-4 text-white">
        {{ $slot }}
    </div>
</div>
