<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NextOfKinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'IdCard' => $this->id_card,
            'Name' => $this->name,
            'Surname' => $this->surname,
            'ContactNumber1' => $this->contact_number_one,
            'ContactNumber2' => $this->contact_number_two,
        ];
    }
}
