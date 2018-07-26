<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int            $id
 * @property string         $last_name
 * @property string         $first_name
 * @property string         $full_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property BelongsToMany  $enterprises
 * @property string         email
 * @property string         confirmed_token
 */
class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'confirmed_token',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Format the first name attribute
     *
     * @param $value
     * @return string
     */
    public function getFirstNameAttribute($value) {
        return ucfirst($value);
    }

    /**
     * Format the last name attribute
     *
     * @param $value
     * @return string
     */
    public function getLastNameAttribute($value) {
        return ucfirst($value);
    }

    /**
     * Get the fully name formatted
     *
     * @return string
     */
    public function getFullNameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get every enterprises of the user
     *
     * @return BelongsToMany
     */
    public function enterprises() {
        return $this->belongsToMany(Enterprise::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills() {
        return $this->hasMany(Skill::class);
    }

    /**
     * Retrieve user for confirmation
     *
     * @param $query
     * @param $emall
     * @param $token
     * @return mixed
     */
    public function scopeWhereConfirmedToken($query, $emall, $token) {
        return $query->where('email', $emall)->where('confirmed_token', $token);
    }
}
