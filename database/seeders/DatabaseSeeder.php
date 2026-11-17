<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
            
        // As quatro pessoas do projeto original
        foreach (['João', 'Maria', 'Paulo', 'Ana'] as $nome) {
        Pessoa::create(['name' => $nome]);
        }
        // Administrador (nível 2). A senha é criptografada pelo cast 'hashed'
        User::create([
        'name' => 'Administrador',
        'email' => 'admin@exemplo.com',
        'password' => 'senha1234',
        'nivel_acesso' => 2,
        ]);
        // Usuário comum (nível 1)
        User::create([
        'name' => 'Usuário Comum',
        'email' => 'comum@exemplo.com',
        'password' => 'senha1234',
        'nivel_acesso' => 1,
        ]);
    }
}
