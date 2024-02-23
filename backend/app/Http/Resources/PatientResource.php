<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->id,
            'IdCard' => $this->id_card,
            'Gender' => $this->gender,
            'Name' => $this->name,
            'Surname' => $this->surname,
            'DateOfBirth' => $this->date_of_birth,
            'Address' => $this->address,
            'Postcode' => $this->post_code,
            'ContactNumber1' => $this->contact_number_one,
            'ContactNumber2' => $this->contact_number_two,
            'NextOfKin' => NextOfKinResource::collection($this->next_of_kin),
            'Medical' => [
                'Conditions' => ConditionResource::collection($this->conditions),
                'Allergies' => AllergyResource::collection($this->allergies),
                'Medications' => MedicationResource::collection($this->medications),
            ],
        ];
    }
}
