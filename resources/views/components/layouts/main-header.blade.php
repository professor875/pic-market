@props([
    'search' => ''
])

<header class="h-[500px] w-full bg-cover flex flex-col items-center justify-center px-8"
        style="background-image: url({{ asset('images/header.jpeg') }})">
    <div class="mt-[80px] w-full md:w-[500px] lg:w-[700px]">
        <h1 class="text-white font-bold text-4xl">
            The best free stock photos, royalty free Landmark images shared by creators.
        </h1>
        <x-inputs.search-input class="mt-2" :search="$search ?? ''"/>
    </div>
</header>
