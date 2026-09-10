<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'guadalupe.juarez@bombasellos.com.mx'], // Evita duplicados
            [
                'name' => 'Admin',
                'email' => 'guadalupe.juarez@bombasellos.com.mx',
                'password' => Hash::make('Lupita89*'), 
                'role' => 'admin',
            ]
        );
    }

}