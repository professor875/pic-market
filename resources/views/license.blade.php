<x-layouts.app>

    <main class="main space-y-16 flex-col max-w-2xl mx-auto items-center justify-center pb-44">
        <div class="heading flex-col max-w-lg mx-auto space-y-5 text-center">
            <h1 class="text-5xl font-bold text-black ">Legal Simplicity</h1>

            <p class="text-2xl font-bold text-black ">All photos and videos on Pexels can be downloaded and used for free.</p>
        </div>

        <div class="main flex-col mx-auto space-y-10 text-center">
            <h1 class="text-4xl flex items-center justify-center space-x-4 font-bold text-black ">What is allowed <x-svg.tick/></h1>

            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-green-200 rounded-xl p-5">
                <div><x-svg.tick/></div>
                <p class="text-xl font-bold">All photos and videos on Pexels are free to use.</p>
            </div>
            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-green-200 rounded-xl p-5">
                <div><x-svg.tick/></div>
                <p class="text-xl font-bold">Attribution is not required. Giving credit to the photographer or Pexels is not necessary but always appreciated.</p>
            </div>
            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-green-200 rounded-xl p-5">
                <div><x-svg.tick/></div>
                <p class="text-xl font-bold">You can modify the photos and videos from Pexels. Be creative and edit them as you like.</p>
            </div>
        </div>

        <div class="main flex-col mx-auto space-y-5 text-center">
            <h1 class="text-4xl flex items-center justify-center space-x-4 font-bold text-black ">What is not allowed <x-svg.cross/></h1>

            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-red-200 rounded-xl p-5">
                <div><x-svg.cross/></div>
                <p class="text-xl font-bold">Identifiable people may not appear in a bad light or in a way that is offensive.</p>
            </div>
            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-red-200 rounded-xl p-5">
                <div><x-svg.cross/></div>
                <p class="text-xl font-bold">Don't sell unaltered copies of a photo or video, e.g. as a poster, print or on a physical product without modifying it first.</p>
            </div>
            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-red-200 rounded-xl p-5">
                <div><x-svg.cross/></div>
                <p class="text-xl font-bold">Don't imply endorsement of your product by people or brands on the imagery.</p>
            </div>
            <div class=" flex items-center text-start justify-start space-x-4 border-2 border-red-200 rounded-xl p-5">
                <div><x-svg.cross/></div>
                <p class="text-xl font-bold">Don't redistribute or sell the photos and videos on other stock photo or wallpaper platforms.</p>
            </div>
        </div>
    </main>

</x-layouts.app>
