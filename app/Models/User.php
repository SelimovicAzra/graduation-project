<?php

namespace App\Models;


use App\Http\Traits\Filterable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\QueryBuilder\Filter;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,HasMediaTrait, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'email', 'password', 'birth_date',
        'city_id', 'email_verified_at', 'phone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
    public static function getFilters()
    {
        return [Filter::scope( 'term')];
    }
    public function scopeTerm(Builder $query, $term): Builder
    {
        return $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('email', 'like', '%' . $term . '%')
            ->orWhere('gender', 'like', '%' . $term . '%')
            ->orWhere('phone_number', 'like', '%' . $term . '%')
            ->orWhere('created_at', 'like', '%' . $term . '%');
    }
    public static function getIncludes()
    {
        return [''];
    }

    public static function getSorts()
    {
        return ['created_at',  'name', 'phone_number', 'email', 'gender'];
    }
}
