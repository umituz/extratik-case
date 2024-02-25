<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

    public function getAllData(): LengthAwarePaginator
    {
        return $this->patient->with(['next_of_kin', 'conditions', 'allergies', 'medications'])->paginate(8);
    }
}
