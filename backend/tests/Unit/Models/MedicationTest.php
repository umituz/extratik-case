<?php

namespace Tests\Unit\Models;

use App\Models\Medication;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function medication_belongs_to_a_patient()
    {
        $patient = Patient::factory()->create();
        $medication = Medication::factory()->create(['patient_id' => $patient->id]);

        $this->assertInstanceOf(Patient::class, $medication->patient);
    }
}
