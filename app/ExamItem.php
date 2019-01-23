<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'exam_items';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
