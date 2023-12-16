@props([
    'action' => '#',
    'method' => 'POST',
])

<div class="w-3/4 md:max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form class="space-y-6" action="{{ $action }}" method="{{ $method }}">
    @csrf
        {{ $slot }}
    </form>
</div>
