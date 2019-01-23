<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTestItem extends Model
{
    /**
     * @var string
     */
    protected $table = 'student_test_items';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentTest()
    {
        return $this->belongsTo(StudentTest::class, 'student_test_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal()
    {
        return $this->belongsTo(Soal::class, 'soal_id');
    }
}
