<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::create([
            'name' => 'B-05',
            'seats' => 4,
            'occupied' => false,
        ]);

        Table::create([
            'name' => 'A-05',
            'seats' => 2,
            'occupied' => false,
        ]);

        Table::create([
            'name' => 'D-02',
            'seats' => 6,
            'occupied' => false,
        ]);
    }
}
