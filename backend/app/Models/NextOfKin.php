<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NextOfKin extends BaseModel
{
    protected $fillable = [
        'patient_id',
        'id_card',
        'name',
        'surname',
        'contact_number_one',
        'contact_number_two',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
