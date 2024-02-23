<?php

namespace App\Http\Controllers\Api;

use App\Services\Base\PatientService;

class PatientsController extends BaseController
{
    private PatientService $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index()
    {
        $items = $this->patientService->getPatientListResource();

        return $this->ok(
            data: $items
        );
    }

    public function show($slug)
    {
        $item = $this->patientService->findBy('id_card', $slug);

        if (! $item) {
            return $this->notFound();
        }

        return $this->ok($item, __('Patient Detail'));
    }
}
