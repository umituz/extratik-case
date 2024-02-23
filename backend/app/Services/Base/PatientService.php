<?php

namespace App\Services\Base;

use App\Http\Resources\PatientCollection;
use App\Repositories\PatientRepositoryInterface;

class PatientService
{
    private PatientRepositoryInterface $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function getPatientListResource(): PatientCollection
    {
        $items = $this->patientRepository->getAllData();

        return new PatientCollection($items);
    }
}
