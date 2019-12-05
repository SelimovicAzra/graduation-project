<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\Filter;

class User extends Authenticatable
{
    use Notifiable;

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
    public static function getFilters()
    {
        return [Filter::scope('term')];
    }
    public function scopeTerm(Builder $query, $term): Builder
    {
        return $query->where('name', 'like', '%' . $term . '%')
            ->orWhere('email', 'like', '%' . $term . '%')
            ->orWhere('phone_number', 'like', '%' . $term . '%')
            ->orWhere('created_at', 'like', '%' . $term . '%');
    }
    public static function getIncludes()
    {
//        return ['kids', 'roles', 'articles', 'therapy', 'city', 'kid-roles.roles', 'kid-roles.kid'];
    }

    public static function getSorts()
    {
        return ['created_at', 'first_name', 'last_name', 'phone_number', 'email'];
    }
}
