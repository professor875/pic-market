<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(30)
            ->hasImages(mt_rand(3, 15))
            ->create();
    }
}
