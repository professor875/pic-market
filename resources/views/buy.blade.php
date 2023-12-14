<x-layouts.app>
    <div class="h-full w-full flex justify-center items-center">
        <img class="w-[50%]" src="{{ asset("/storage/images/$image->filename") }}" alt="">
        <div class="w-[50%] flex justify-center items-center">
            @if($purchase)
                <a href="{{ route('images.download', $image->id) }}">
                    <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 w-full">Download</button>
                </a>
            @else
                <form action="{{ route('images.purchase', $image->id) }}" method="POST" class="p-6 border-2 rounded-xl bg-white w-[70%]">
                    @csrf

                    <div class="mb-8 w-full text-center">
                        <p class="font-bold text-xl">Pay ${{ $image->price }} to get the download image.</p>
                    </div>

                    <div class="mb-5">
                        <label for="card" class="block mb-2 text-sm font-medium text-gray-900">Card Number</label>
                        <input type="number" id="card" name="card" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Card Number" required>
                        <x-input-error :messages="$errors->get('card')"/>
                    </div>

                    <div class="mb-5 flex items-center space-x-2">
                        <div class="w-[50%]">
                            <label for="expiry" class="block mb-2 text-sm font-medium text-gray-900">Expiry</label>
                            <input type="text" id="expiry" name="expiry" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Card Number" required>
                            <x-input-error :messages="$errors->get('expiry')"/>
                        </div>

                        <div class="w-[50%]">
                            <label for="csv" class="block mb-2 text-sm font-medium text-gray-900">Card Number</label>
                            <input type="number" id="csv" name="csv" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Card Number" required>
                            <x-input-error :messages="$errors->get('csv')"/>
                        </div>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 w-full">Payment</button>
                </form>
            @endif
        </div>
    </div>
</x-layouts.app>
