<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            ['nombre' => 'Benjamin', 'email' => 'benjaharvey@mail.com', 'password' => '12345', 'rol_id' => 1],
            ['nombre' => 'Cliente Prueba', 'email' => 'cliente@prueba.com', 'password' => 'cliente123', 'rol_id' => 2],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::firstOrCreate(['email' => $usuario['email']], $usuario);
        }
    }
}