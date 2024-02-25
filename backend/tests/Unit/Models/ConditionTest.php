<?php

namespace Tests\Unit\Models;

use App\Models\Condition;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConditionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function condition_belongs_to_a_patient()
    {
        $patient = Patient::factory()->create();
        $condition = Condition::factory()->create(['patient_id' => $patient->id]);

        $this->assertInstanceOf(Patient::class, $condition->patient);
    }
}
