<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function fetch(Request $request)
    {
        $lastImageId = $request->last_image_id;
        $search = $request->get('query');

        $imagesCollection = Image::query()
            ->when(
                $search,
                fn($images) => $images->where(fn($images) => $images->where('name', 'LIKE', "%$search%")
                    ->orWhereHas('tags', fn($tags) => $tags->where('name', 'LIKE', "%$search%"))
                    ->orWhereHas('user', fn($user) => $user->where('name', 'LIKE', "%$search%")))
            )
            ->when($lastImageId != 0, fn($images) => $images->where('id', '<', $lastImageId))
            ->latest('id')
            ->take(9)
            ->with('user')
            ->get();


        $imagesCollection = $this->makeEqualChunks($imagesCollection->toArray(), 3);

        return response()->json(['images' => $imagesCollection]); // Wrap in an additional array
    }

    private function makeEqualChunks(array $array, $numOfChunk)
    {
        $collection = [];

        $i = 0;

        foreach ($array as $item) {
            $collection[$i][] = $item;

            if ($i >= $numOfChunk - 1) {
                $i = 0;
            } else {
                $i++;
            }
        }

        return $collection;
    }

    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|min:1',
            'image' => 'required|image|mimetypes:image/*',
            'tags' => 'required',
        ]);

        $path = $request->file('image')->store('images', 'public');
        $filename = basename($path);

        $image = $request->user()->images()->create([
            'name' => $request->name,
            'price' => $request->price,
            'filename' => $filename,
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            $image->tags()->create(['name' => $tag]);
        }

        return back()->with('success', __('Picture uploaded successfully.'));
    }

    public function buy(Request $request, Image $image)
    {
        $purchase = false;

        if ($request->user()->purchases()->where('image_id', $image->id)->exists() OR $image->user_id == $request->user()->id) {
            $purchase = true;
        }

        return view('buy', compact(['image', 'purchase']));
    }

    public function purchase(Request $request, Image $image)
    {
        if ($request->user()->purchases()->where('image_id', $image->id)->exists() OR $image->user_id == $request->user()->id) {
            return back()->with('info', __('Image is already purchased.'));
        }

        $request->user()->purchases()->create([
            'image_id' => $image->id,
            'price' => $image->price
        ]);

        return back()->with('success', __('Image has been purchased.'));
    }

    public function download(Request $request, Image $image)
    {
        if ($request->user()->purchases()->where('image_id', $image->id)->doesntExist() OR $image->user_id != $request->user()->id) {
            return back()->with('info', __('Please purchase the image first.'));
        }

        return response()->download(storage_path("/app/public/images/$image->filename"));
    }
}
