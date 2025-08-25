<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (App::environment() === 'production') {
            return;
        }

        if ($this->isAlreadySeeded()) {
            return;
        }

        User::create(
            [
                'name' => 'admin',
                'email' => 'test@test.com',
                'password' => bcrypt('password'),
            ]
        );
    }

    private function isAlreadySeeded(): bool
    {
        return User::where('email', 'test@test.com')->exists();
    }
}
