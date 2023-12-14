<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Replace with the appropriate user ID
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Adjust the range as needed
            'url' => $this->faker->imageUrl(),
            'preview_url' => $this->faker->imageUrl(),
        ];
    }

    public function configure(): ImageFactory
    {
        return $this->afterCreating(function (Image $image) {
            $directoryPath = 'public/images';

            if (!Storage::exists($directoryPath)) {
                Storage::makeDirectory($directoryPath);
            }

            $files = glob(database_path('/source') . '/*');
            $randomFile = $files[array_rand($files)];
            $newFilename = Str::uuid() .'.'. pathinfo($randomFile, PATHINFO_EXTENSION);

            File::copy($randomFile, storage_path("app/$directoryPath/$newFilename"));

            $image->update(['filename' => $newFilename]);
        });
    }
}
