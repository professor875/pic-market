<x-layouts.app>
    <x-slot name="header">
        <x-layouts.main-header :search="$search ?? ''"/>
    </x-slot>

    <div class="flex justify-between items-center">
        <h1 class="text-2xl text-gray-900 font-bold">Free Stock Photos</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-4">
        <div class="grid gap-y-4 h-fit" id="column1"></div>

        <div class="grid gap-y-4 h-fit" id="column2"></div>

        <div class="grid gap-y-4 h-fit" id="column3"></div>
    </div>

    <div class="hidden">
        <div class="group" id="sample-image-container">
            <a href="#buy-url" class="w-full relative cursor-pointer">
                <img src="{{ asset('/storage/images/fake-filename.jpg') }}" class="w-full group-hover:brightness-75" alt="Image 3">
                <p class="hidden group-hover:block absolute top-5 left-5 text-white font-bold text-2xl">
                    image-name
                </p>
                <div class="hidden group-hover:block absolute bottom-5 left-5 text-white">
                    <div class="flex items-center space-x-2">
                        <img class="w-[30px] rounded-full"
                             src="https://www.shutterstock.com/image-illustration/avatar-modern-young-guy-working-260nw-2015853839.jpg"
                             alt="">
                        <p class="font-bold">username</p>
                    </div>
                </div>
                <button class="hidden group-hover:block absolute bottom-5 right-5 bg-green-600 font-bold text-white p-2 rounded">$dummy-price</button>
            </a>
        </div>
    </div>

    <script>
        function fetchImages() {
            return {
                query: "{{ $search ?? null }}",
                lastImageId: 0,
                fetch: async function () {
                    await axios.post('{{ route('images.fetch') }}' + `?query=${this.query}`, {
                        'last_image_id': this.lastImageId,
                    })
                        .then(response => {
                            const imagesCollection = response.data.images;
                            const firstColumn = imagesCollection[0];
                            const secondColumn = imagesCollection[1];
                            const thirdColumn = imagesCollection[2];

                            if (firstColumn) {
                                this.appendInColumn(firstColumn, 1);
                            }

                            if (secondColumn) {
                                this.appendInColumn(secondColumn, 2);
                            }

                            if (thirdColumn) {
                                this.appendInColumn(thirdColumn, 3);
                            }
                        })
                        .catch(error => console.error('Error fetching images:', error));
                },
                appendInColumn: function (images, columnNumber) {
                    const welcomeUrl = '{{route('welcome')}}';

                    images.forEach(item => {
                        this.updateLastImageId(item.id);

                        const columnTag = document.getElementById(`column${columnNumber}`);
                        const imageContainer = document.getElementById('sample-image-container');
                        const newImageContainer = imageContainer.cloneNode(true);

                        // Replace multiple occurrences in a single assignment
                        newImageContainer.innerHTML = newImageContainer.innerHTML
                            .replace(/fake-filename.jpg/g, item.filename)
                            .replace(/dummy-price/g, item.price)
                            .replace(/image-name/g, item.name)
                            .replace(/#buy-url/g, welcomeUrl + '/images/buy/' +item.id)
                            .replace(/username/g, item.user.name);
                         // You can use the item ID or another unique identifier
                        newImageContainer.id = `uniqueId_${item.id}`;

                        columnTag.appendChild(newImageContainer);
                    });
                },
                updateLastImageId: function (id) {
                    if (this.lastImageId === 0) {
                        this.lastImageId = id;
                        return
                    }

                    if (id < this.lastImageId) {
                        this.lastImageId = id;
                    }
                }
            };
        }

        document.addEventListener("DOMContentLoaded", () => {
            let imageFetcher = fetchImages();
            imageFetcher.fetch();

            window.addEventListener('scroll', function () {
                let scrollPosition = window.scrollY || document.documentElement.scrollTop;
                let totalHeight = document.documentElement.scrollHeight;
                let windowHeight = window.innerHeight;

                if (scrollPosition + windowHeight >= totalHeight) {
                    imageFetcher.fetch();
                }
            });
        });
    </script>
</x-layouts.app>
