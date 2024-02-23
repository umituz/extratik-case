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
            'id' => $this->id,
            'id_card' => $this->id_card,
            'gender' => $this->gender,
            'name' => $this->name,
            'surname' => $this->surname,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'post_code' => $this->post_code,
            'contact_number_one' => $this->contact_number_one,
            'contact_number_two' => $this->contact_number_two,
        ];
    }
}
