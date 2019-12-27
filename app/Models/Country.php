<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filter;

class Country extends Model
{
    use Filterable;
    protected $fillable = [
        'name', 'calling_code', 'capital', 'code', 'code_alpha3',
        'currency_code', 'currency_name', 'emoji', 'full_name', 'top_level_domain'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
    public static function getFilters()
    {
        return [Filter::scope('term')];
    }
    public function scopeTerm(Builder $query, $term): Builder
    {
        return $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('capital', 'like', '%' . $term . '%')
            ->orWhere('calling_code','like', '%' . $term . '%')
            ->orWhere('code', 'like', '%' . $term . '%')
            ->orWhere('currency_name', 'like', '%' . $term . '%')
            ->orWhere('emoji', 'like', '%' . $term . '%')
            ->orWhere('full_name', 'like', '%' . $term . '%')
            ->orWhere('created_at', 'like', '%' . $term . '%');

    }

    public static function getIncludes()
    {
        return ['cities', 'medicines'];
    }

    public static function getSorts()
    {
        return [ 'name', 'calling_code','capital', 'code', 'currency_name', 'emoji', 'full_name', 'top_level_domain', 'created_at'];
    }
}
