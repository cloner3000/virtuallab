<?php

namespace App;

use App\Pivots\UserPraktikum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Silvanite\Brandenburg\Role;

class Student extends Model
{
    protected $table = "users";

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('student', function (Builder $builder) {
            $builder->whereHas('roles', function ($q) {
                $q->where('slug', 'student');
            });
        });
    }

    /**
     * The model relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function praktikum()
    {
        return $this->belongsToMany(Praktikum::class, 'user_praktikum', 'student_id', 'praktikum_id')
            ->withPivot('teacher_id', 'score');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTest()
    {
        return $this->hasMany(StudentTest::class, 'student_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentExams()
    {
        return $this->hasMany(StudentExam::class, 'student_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'student_exam', 'student_id', 'exam_id')
            ->withPivot('teacher_id', 'score');
    }

    /**
     * @param $examId
     * @param $itemId
     * @return bool
     */
    public function alreadyAnswerExamItem($examId, $itemId)
    {
        $studentExam = $this->studentExams()->where('exam_id', $examId)->first();
        if ($studentExam == null) {
            return false;
        }

        $studentExamItem = $studentExam->items()->where('id', $itemId)->first();
        if ($studentExamItem == null) {
            return false;
        }

        if ($studentExamItem->answer == null) {
            return false;
        }

        return true;
    }

    /**
     * @param $examId
     * @param $itemId
     * @return string
     */
    public function getAnswerExamItem($examId, $itemId)
    {
        $studentExam = $this->studentExams()->where('exam_id', $examId)->first();
        if ($studentExam == null) {
            return "";
        }

        $studentExamItem = $studentExam->items()->where('id', $itemId)->first();
        if ($studentExamItem == null) {
            return "";
        }

        if ($studentExamItem->answer == null) {
            return "";
        }

        return $studentExamItem->answer;
    }

    public function alreadyAnswerAllExamItem($examId)
    {
        $studentExam = $this->studentExams()->where('exam_id', $examId)->first();
        if ($studentExam == null) {
            return false;
        }

        if ($studentExam->items->count() <= 0) {
            return false;
        }

        $studentExamItem = $studentExam->items()->whereNull('answer')->get();
        if ($studentExamItem->count() > 0) {
            return false;
        }
        return true;
    }
}
