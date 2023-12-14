@props([
    'trigger' => ''
])

<div
    x-data="{open: false}"
    @mouseleave="open = false"
    class="relative p-4"
>
    <p class="{{ $trigger }}" @mouseenter="open = true">{{ $triger }}</p>

    <div
        x-show="open"
        class="absolute bg-white w-[200px] right-2 top-18 rounded-md border-2"
    >
        <div class="flex flex-col text-black py-2">
            {{ $slot }}
        </div>
    </div>
</div>
