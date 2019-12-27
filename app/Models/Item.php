<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\QueryBuilder\Filter;

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
    public static function getFilters()
    {
        return [Filter::scope( 'term')];
    }
    public function scopeTerm(Builder $query, $term): Builder
    {
        return $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('description', 'like', '%' . $term . '%')

            ->orWhere('created_at', 'like', '%' . $term . '%');
    }
    public static function getIncludes()
    {
        return [''];
    }

    public static function getSorts()
    {
        return ['created_at',  'name', 'description'];
    }

}
