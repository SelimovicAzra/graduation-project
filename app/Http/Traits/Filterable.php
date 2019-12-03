<?php
namespace App\Http\Traits;

use Spatie\QueryBuilder\QueryBuilder;

trait Filterable
{
  public static function filter()
  {
    return  QueryBuilder::for(static::class) 
            ->allowedIncludes(self::getIncludes())
            ->allowedFilters(self::getFilters())
            ->allowedSorts(self::getSorts());

  }
}