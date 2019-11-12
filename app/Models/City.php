<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'slug', 'zip_code', 'country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
