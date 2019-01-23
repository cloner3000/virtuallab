<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * @var string
     */
    protected $table = 'exams';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(ExamItem::class, 'exam_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentExam()
    {
        return $this->hasMany(StudentExam::class, 'exam_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_exam', 'exam_id', 'student_id')
            ->withPivot('teacher_id', 'score');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentExams()
    {
        return $this->hasMany(StudentExam::class, 'exam_id');
    }
}
