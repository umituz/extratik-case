<?php

namespace App\Services\Base;

use App\Http\Resources\PatientCollection;
use App\Http\Resources\PatientResource;
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

    public function findBy($key, $value)
    {
        $item = $this->patientRepository->findBy($key, $value);

        if ($item) {
            $item->load(['next_of_kin', 'conditions', 'allergies', 'medications']);

            return new PatientResource($item);
        }

        return null;
    }

    public function create($data)
    {
        $item = $this->patientRepository->create($data);

        return new PatientResource($item);
    }

    public function update($id, $data)
    {
        $item = $this->patientRepository->update($id, $data);

        return new PatientResource($item);
    }

    public function destroy($id)
    {
        return $this->patientRepository->delete('id', $id);
    }
}
