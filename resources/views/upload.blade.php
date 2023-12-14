<x-layouts.app>
    <form action="{{ route('images.upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5 w-full">
            <img class="hidden mx-auto max-w-[500px] w-full" id="preview" src="" alt="">
        </div>
        <div class="mb-5">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
            <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Name" required>
            <x-input-error :messages="$errors->get('image')"/>
        </div>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Name" required>
            <x-input-error :messages="$errors->get('name')"/>
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
            <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Price" required>
            <x-input-error :messages="$errors->get('price')"/>
        </div>
        <div class="mb-5">
            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900">Tags</label>
            <input type="text" id="tags" name="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter tags comma separated which will usefully in searching" required>
            <x-input-error :messages="$errors->get('tags')"/>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Submit</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Triggered when file input changes
            document.getElementById('image').addEventListener('change', function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    // Display image preview as block
                    let imagePreview = document.getElementById('preview');
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-layouts.app>
