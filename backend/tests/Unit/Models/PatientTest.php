<?php

namespace Tests\Unit\Models;

use App\Models\Allergy;
use App\Models\Condition;
use App\Models\Medication;
use App\Models\NextOfKin;
use App\Models\Patient;
use App\Models\Scopes\SortingScope;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class PatientTest extends TestCase
{
    /** @test */
    public function a_patient_has_next_of_kin()
    {
        $patient = new Patient;
        $this->assertInstanceOf(Collection::class, $patient->next_of_kin);
        $this->assertInstanceOf(NextOfKin::class, $patient->next_of_kin()->getModel());
    }

    /** @test */
    public function a_patient_has_conditions()
    {
        $patient = new Patient;
        $this->assertInstanceOf(Collection::class, $patient->conditions);
        $this->assertInstanceOf(Condition::class, $patient->conditions()->getModel());
    }

    /** @test */
    public function a_patient_has_allergies()
    {
        $patient = new Patient;
        $this->assertInstanceOf(Collection::class, $patient->allergies);
        $this->assertInstanceOf(Allergy::class, $patient->allergies()->getModel());
    }

    /** @test */
    public function a_patient_has_medications()
    {
        $patient = new Patient;
        $this->assertInstanceOf(Collection::class, $patient->medications);
        $this->assertInstanceOf(Medication::class, $patient->medications()->getModel());
    }

    /** @test */
    public function it_uses_sorting_scope()
    {
        $patient = new Patient;
        $this->assertTrue($patient->hasGlobalScope(SortingScope::class));
    }
}
