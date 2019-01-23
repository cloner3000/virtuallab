<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    /**
     * Model's table
     * @var string
     */
    protected $table = 'soal';

    /**
     * Model's belongsTo relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id');
    }
}
