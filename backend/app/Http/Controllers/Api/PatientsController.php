<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PatientRequest;
use App\Services\Base\PatientService;
use Illuminate\Http\Request;

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

    public function store(PatientRequest $request)
    {
        $item = $this->patientService->create($request->validated());

        return $this->created($item, __('Patient Created Successfully'));
    }

    public function update(PatientRequest $request, $id)
    {
        $item = $this->patientService->update($id, $request->all());

        return $this->ok($item, __('Patient Updated Successfully'));
    }

    public function destroy($id)
    {
        $item = $this->patientService->destroy($id, );

        return $this->noContent(null, __('Patient Deleted Successfully'));
    }

}
