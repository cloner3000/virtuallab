<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentExamItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'student_exam_items';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentExam()
    {
        return $this->belongsTo(StudentExam::class, 'student_exam_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examItem()
    {
        return $this->belongsTo(ExamItem::class, 'exam_item_id');
    }
}
