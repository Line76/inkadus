<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 * @package App
 */
class Skill extends Model {

    /**
     * @var array
     */
    protected $fillable = ['label'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}
