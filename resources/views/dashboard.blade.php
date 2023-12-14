<x-layouts.app>
    <div class="py-12 bg-white shadow-sm rounded-lg flex items-center justify-around">
        <div class="w-[400px] h-[300px] flex justify-center items-center border-2 shadow-green-400 shadow-xl rounded-lg">
            <div class="text-center text-2xl">
                <p>You have earned</p>
                <p class="text-green-600 font-bold">${{ $totalEarning }}</p>
            </div>
        </div>

        <div class="w-[400px] h-[300px] flex justify-center items-center border-2 shadow-green-400 shadow-xl rounded-lg">
            <div class="text-center text-2xl">
                <p>Your uploaded images</p>
                <p class="text-green-600 font-bold">{{ $totalImagesCount }}</p>
            </div>
        </div>

        <div class="w-[400px] h-[300px] flex justify-center items-center border-2 shadow-green-400 shadow-xl rounded-lg">
            <div class="text-center text-2xl">
                <p>Total purchased images</p>
                <p class="text-green-600 font-bold">{{ $totalPurchasesCount }}</p>
            </div>
        </div>
</x-layouts.app>
