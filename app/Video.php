<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Model's table
     * @var string
     */
    protected $table = 'videos';

    /**
     * Model's belongsTo relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id');
    }
}
