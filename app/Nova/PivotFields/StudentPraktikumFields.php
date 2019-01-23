<?php
namespace App\Nova\PivotFields;

use App\Teacher;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;

class StudentPraktikumFields
{
    public function __invoke()
    {
        $teachers = Teacher::all()->pluck('name', 'id');
        return [
            Select::make('Teacher', 'teacher_id')
                ->options($teachers)
                ->displayUsing(function ($fields) {
                    $teacher = Teacher::find($fields);
                    return $teacher->name;
                }),

            Number::make('Score', 'score')
                ->exceptOnForms(),
        ];
    }
}