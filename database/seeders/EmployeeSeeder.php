<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $shiftIds = Shift::pluck('id')->toArray();

        for ($i = 0; $i < 12; $i++) {
            Employee::create([
                'shift_id' => $faker->randomElement($shiftIds),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'designation' => $faker->jobTitle,
                'joining_date' => $faker->date(),
            ]);
        }
    }
}
