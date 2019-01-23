<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    /**
     * Model's table
     * @var string
     */
    protected $table = 'materi';

    /**
     * Model's belongstTo relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id');
    }
}
