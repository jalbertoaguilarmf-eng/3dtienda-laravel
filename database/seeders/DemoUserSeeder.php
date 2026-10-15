<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'demo@3dtienda.test'],
            [
                'name' => 'Usuario Demo',
                'username' => 'demo',
                'role' => 'designer',
                'password' => Hash::make('Demo3Dtienda#2026'),
            ],
        );
    }
}
