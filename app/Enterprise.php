<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int            $id
 * @property string         $name
 * @property string         $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property BelongsToMany  $users
 * @property array          $attributes
 */
class Enterprise extends Model {
    protected $fillable = ['name'];

    /**
     * Changed the route key to use the slug
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Retrieve every users from one enterprise
     *
     * @return BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get formatted name
     *
     * @param $value
     * @return string
     */
    public function getNameAttribute($value) {
        return ucfirst($value);
    }

    /**
     * Set the slug attribute with the name
     *
     * @return string
     */
    public function setSlugAttribute() {
        $this->attributes['slug'] = str_slug($this->name);
    }

    public function scopeFindWithSlug($query, $slug) {
        return $query->where('slug', $slug);
    }
}
