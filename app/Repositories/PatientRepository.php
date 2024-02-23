<?php

namespace App\Repositories;

use App\Models\Patient;

/**
 * Class PatientRepository
 */
class PatientRepository extends BaseRepository implements PatientRepositoryInterface
{
    private Patient $patient;

    public function __construct(Patient $patient)
    {
        parent::__construct($patient);

        $this->patient = $patient;
    }
}
