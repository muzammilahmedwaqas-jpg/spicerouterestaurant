<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::create(['name' => 'Morning Shift', 'start_time' => '08:00:00', 'end_time' => '16:00:00']);
        Shift::create(['name' => 'Evening Shift', 'start_time' => '16:00:00', 'end_time' => '00:00:00']);
        Shift::create(['name' => 'Night Shift', 'start_time' => '00:00:00', 'end_time' => '08:00:00']);
    }
}
