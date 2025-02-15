<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adiciona um cliente
        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@sushiaway.com',
            'password' => bcrypt('Password'),
            'role' => 'client', // Pode ser cliente, empregado ou gerente
            'phone' => '123456789',
        ]);

        // Adiciona um empregado
        User::create([
            'name' => 'Empregado 1',
            'email' => 'empregado1@sushiaway.com',
            'password' => bcrypt('Password'),
            'role' => 'employee',
            'phone' => '987654321',
        ]);

        // Adiciona um gerente
        User::create([
            'name' => 'Gerente 1',
            'email' => 'gerente1@sushiaway.com',
            'password' => bcrypt('Password'),
            'role' => 'manager',
            'phone' => '111223344',
        ]);
    }
}
