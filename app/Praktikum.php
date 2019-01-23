<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praktikum extends Model
{
    /**
     * The model's table
     * @var string
     */
    protected $table = 'praktikum';

    /**
     * Model's hasMany relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materi()
    {
        return $this->hasMany(Materi::class, 'praktikum_id');
    }

    /**
     * Model's hasMany relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function video()
    {
        return $this->hasMany(Video::class, 'praktikum_id');
    }

    /**
     * Model's hasMany relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function soal()
    {
        return $this->hasMany(Soal::class, 'praktikum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class,'user_praktikum', 'praktikum_id', 'student_id')
            ->withPivot('teacher_id', 'score');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentTest()
    {
        return $this->hasMany(StudentTest::class, 'praktikum_id');
    }
}
