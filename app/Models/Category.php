<?php

namespace App\Models;

use App\Http\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filter;

class Category extends Model
{
    use Filterable;
    protected $fillable=['name', 'created_at'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public static function getFilters()
    {
        return [Filter::scope('term')];
    }

    public static function getIncludes()
    {
        return [''];
    }

    public static function getSorts()
    {
        return ['name', 'created_at'];
    }

    public function scopeTerm(Builder $query, $term): Builder
    {
        return $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('created_at', 'like', '%' . $term . '%');

    }
}
