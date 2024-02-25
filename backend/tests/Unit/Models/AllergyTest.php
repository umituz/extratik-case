<?php

namespace Tests\Unit\Models;

use App\Models\Allergy;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AllergyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function allergy_belongs_to_a_patient()
    {
        $patient = Patient::factory()->create();
        $allergy = Allergy::factory()->create(['patient_id' => $patient->id]);

        $this->assertInstanceOf(Patient::class, $allergy->patient);
    }
}
