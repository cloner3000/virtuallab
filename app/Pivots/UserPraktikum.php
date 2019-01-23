<?php
namespace App\Pivots;

use App\Teacher;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPraktikum extends Pivot
{
    protected $table = 'user_praktikum';

    /**
     * Pivot relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}