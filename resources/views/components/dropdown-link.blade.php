@props(['route' => '#'])
<a href="{{ $route }}" {{ $attributes->merge(['class' => 'text-lg px-3 py-2 hover:bg-gray-200 cursor-pointer']) }}>
    {{ $slot }}
</a>
