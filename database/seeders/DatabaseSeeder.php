<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario Creador / Mentor Principal
        $creator = User::create([
            'name' => 'Sofía Alarcón (Editora)',
            'email' => 'creador@ejemplo.com',
            'password' => Hash::make('password123'),
            'role' => 'editor',
        ]);

        Post::create([
            'user_id' => $creator->id,
            'title' => 'El arte de la lectura pausada en la era digital',
            'content' => 'Bienvenido a Lumina. Un espacio creado para reencontrarnos con la belleza de las palabras, compartir reflexiones sin prisa y construir una comunidad apasionada por la lectura.',
            'status' => 'public',
        ]);

        // 15 Lectores / Usuarios de la comunidad
        for ($i = 1; $i <= 15; $i++) {
            $user = User::create([
                'name' => "Lector $i",
                'email' => "lector$i@ejemplo.com",
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]);

            Post::create([
                'user_id' => $user->id,
                'title' => "Reflexión diaria de Lector $i",
                'content' => "Hoy logré dedicar 30 minutos a leer antes de dormir. La tranquilidad de compartir este hábito me motiva a continuar.",
                'status' => 'public',
            ]);
        }
    }
}