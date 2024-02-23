<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medication extends BaseModel
{
    protected $fillable = [
        'patient_id',
        'name',
        'notes',
        'start_date',
        'end_date',
    ];

    /**
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
