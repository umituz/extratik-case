<?php

namespace Tests\Unit\Models;

use App\Models\NextOfKin;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NextOfKinTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function next_of_kin_belongs_to_a_patient()
    {
        $patient = Patient::factory()->create();
        $nextOfKin = NextOfKin::factory()->create(['patient_id' => $patient->id]);

        $this->assertInstanceOf(Patient::class, $nextOfKin->patient);
    }
}
