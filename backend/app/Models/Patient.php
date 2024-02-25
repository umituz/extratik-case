<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends BaseModel
{
    protected $fillable = [
        'id_card',
        'gender',
        'name',
        'surname',
        'date_of_birth',
        'address',
        'post_code',
        'contact_number_one',
        'contact_number_two',
    ];

    protected $casts = [
        'date_of_birth' => 'date:d-m-Y',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
    }

    public function next_of_kin(): HasMany
    {
        return $this->hasMany(NextOfKin::class);
    }

    public function conditions(): HasMany
    {
        return $this->hasMany(Condition::class);
    }

    public function allergies(): HasMany
    {
        return $this->hasMany(Allergy::class);
    }

    public function medications(): HasMany
    {
        return $this->hasMany(Medication::class);
    }
}
