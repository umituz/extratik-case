<?php

namespace Database\Seeders;

use App\Models\NextOfKin;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class NextOfKinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::all()->each(function ($patient) {
            NextOfKin::factory(2)->create(['patient_id' => $patient->id]);
        });
    }
}
