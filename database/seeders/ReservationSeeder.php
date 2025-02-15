<?php

namespace Database\Seeders;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        Reservation::create([
            'table_id' => 1, // Id da Mesa A
            'user_id' => 1,
            'reservation_date' => '2024-12-15',
            'reservation_time' => '19:00',
            'num_people' => 4,
        ]);

        Reservation::create([
            'table_id' => 2,
            'user_id' => 2,
            'reservation_date' => '2024-12-15',
            'reservation_time' => '19:00',
            'num_people' => 2,
        ]);

    }
}
