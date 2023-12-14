<nav
    x-data="{ fixed: false, openHamburger: false }"
    x-on:scroll.window="fixed = openHamburger ? false : window.scrollY > 500"
    x-init="$watch('openHamburger', value => fixed = openHamburger ? fixed : window.scrollY > 500)"
    class="w-full h-[80px] bg-transparent bg-white"
>
    <div
        class="h-full xl:w-[90%] 2xl:w-[80%] w-[95%] mx-auto flex justify-between items-center lg:space-x-6 xl:space-x-16  ">
        <x-application-logo class="h-full mt-2"/>
        <div
            class="hidden lg:flex space-x-8 justify-between items-center text-black">
            <a href="license" class="cursor-pointer hover:text-gray-400 text-xl">License</a>
            <a href="{{ route('images.upload') }}" class="cursor-pointer hover:text-gray-400 text-xl">Upload</a>
            <x-dropdown trigger="cursor-pointer text-4xl mb-4">
                <x-slot:triger>
                    ...
                </x-slot:triger>

                @guest()
                <x-dropdown-link :route="route('login')">Login</x-dropdown-link>
                @endguest()
                @auth()
                <x-dropdown-link><a href="#" x-data="{}" @click="document.querySelector('#logout-form').submit()">LogOut</a></x-dropdown-link>
                @endauth
                <x-dropdown-link :route="route('register')">Join</x-dropdown-link>
                <x-dropdown-link :route="route('images.upload')">Upload</x-dropdown-link>
                <x-dropdown-link :route="route('terms')">Terms</x-dropdown-link>
                <x-dropdown-link :route="route('license')">License</x-dropdown-link>
            </x-dropdown>
            <form id="logout-form" method="POST" class="hidden" action="{{ route('logout') }}">
                @csrf
            </form>
            @if(auth()->check())
                <a href="{{ route('profile.edit') }}">
                    <button
                        class="text-white bg-green-500 rounded py-2.5 px-4 text-xl"
                    >
                        Profile
                    </button>
                </a>
            @else
                <a href="{{ route('register') }}">
                    <button
                        class="text-white bg-green-700 hover:bg-green-800 rounded-lg py-2.5 px-4 text-xl font-extrabold"
                    >
                        Join
                    </button>
                </a>
            @endif
        </div>
        <button @click="openHamburger = !openHamburger" class="block lg:hidden p-3 text-black">
                <x-svg.hamberger-svg/>
        </button>
    </div>

    <div x-show="openHamburger" x-cloak="" class="absolute lg:hidden w-full top-0 bg-white px-6">
        <div class="h-[80px] w-full flex justify-between items-center">
            <x-application-logo class="h-full mt-2"/>
            <button @click="openHamburger = false" class="w-6 me-4">
                <x-svg.cross-svg/>
            </button>
        </div>
    </div>
</nav>
