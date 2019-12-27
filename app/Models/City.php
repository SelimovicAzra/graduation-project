<?php

namespace App\Models;
use  App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filter;

class City extends Model
{
    use Filterable;
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
    public static function getFilters()
    {
        return [Filter::scope('term')];
    }
    public function scopeTerm(Builder $query, $term) : Builder
    {
        return $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('zip_code', 'like', '%' . $term . '%')
            ->orWhere('created_at', 'like', '%' . $term . '%');
    }
    public static function getIncludes()
    {
        return ['companies','users', 'country'];
    }

    public static function getSorts()
    {
        return ['name','zip_code','created_at'];
    }
}
