<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@assistsjob.com'],
            [
                'name' => 'Skill Launches Admin',
                'password' => Hash::make('123456789'),
            ]
        );
    }
}
