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
            ['nombre' => 'admin', 'email' => 'admin@prueba.com', 'password' => 'admin12345', 'rol_id' => 1],
            ['nombre' => 'cliente', 'email' => 'cliente@prueba.com', 'password' => 'cliente12345', 'rol_id' => 2],
        ];

        foreach ($usuarios as $usuario) {
            Usuario::firstOrCreate(['email' => $usuario['email']], $usuario);
        }
    }
}
