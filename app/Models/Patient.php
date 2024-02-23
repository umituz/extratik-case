<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;

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
        'contact_number_two'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortingScope);
    }
}
