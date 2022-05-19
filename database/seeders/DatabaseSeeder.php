<?php

namespace Database\Seeders;

use App\Models\Accountant;
use App\Models\Branch;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Receptionist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Branch::factory()->create();
        Clinic::factory(3)->create();

        Doctor::factory(5)->create();
        Receptionist::factory(3)->create();
        Accountant::factory()->create();

        Patient::factory(10)->create();
    }
}
