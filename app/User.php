<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
 */
class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

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
}
