<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Allergy extends BaseModel
{
    protected $fillable = [
        'patient_id',
        'name',
        'notes',
    ];

    /**
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
