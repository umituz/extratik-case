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

    /**
     * @return PatientCollection
     */
    public function getPatientListResource(): PatientCollection
    {
        $items = $this->patientRepository->paginate();

        return new PatientCollection($items);
    }
}
