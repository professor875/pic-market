@props([
    'search' => ''
])

<form action="{{ route('welcome') }}" method="GET" {{ $attributes->merge(['class' => 'h-[48px] w-full flex items-center']) }}>
    <input
        type="text"
        name="query"
        value="{{ old('search') ?? $search ?? '' }}"
        class=" h-full w-full focus:ring-0 focus:border-black rounded-l-xl border-2 border-r-0 border-black bg-gray-100"
        placeholder="Search Pictures"
    >

    <button type="submit" class=" border-2 border-black rounded-r-xl h-full px-3 border-l-0 bg-gray-100">
        <x-svg.search-svg/>
    </button>
</form>
