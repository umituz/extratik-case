<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Condition extends BaseModel
{
    protected $fillable = [
        'patient_id',
        'name',
        'notes',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
