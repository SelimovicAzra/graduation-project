<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Item extends Model implements HasMedia
{
    use Filterable, HasMediaTrait;
    protected $fillable = ['name', 'category_id','description', 'city_id', 'user_id'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
