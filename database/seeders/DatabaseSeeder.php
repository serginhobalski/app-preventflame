<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'Admin',
                'surname' => 'Geral',
                'username' => 'admin',
                'email' => 'admin@geral.com',
                'group' => 'admin',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Aluno',
                'surname' => 'Teste',
                'username' => 'aluno',
                'email' => 'aluno@teste.com',
                'group' => 'usuario',
                'password' => Hash::make('123456789'),
            ]
        ];

        foreach ($usuarios as $usuario) {
            \App\Models\User::create($usuario);
        }
        echo 'Database semeada com sucesso!';
    }
}
