<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    /**
     * Model's table
     * @var string
     */
    protected $table = 'student_tests';

    /**
     * Model's belongsTo relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * Model's belongsTo relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function praktikum()
    {
        return $this->belongsTo(Praktikum::class, 'praktikum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(StudentTestItem::class, 'student_test_id');
    }

    public function updateScore()
    {
        $this->score = $this->items()->avg('score');
        $this->save();
    }
}
