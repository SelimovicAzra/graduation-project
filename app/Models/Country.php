<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'calling_code', 'capital', 'code', 'code_alpha3',
        'currency_code', 'currency_name', 'emoji', 'full_name', 'top_level_domain'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
