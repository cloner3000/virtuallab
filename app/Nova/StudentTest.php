<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StudentTest extends Resource
{
    /**
     * The resource group
     *
     * @var string
     */
    public static $group = 'Praktikum Managements';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\StudentTest';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'test_code';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'test_code',
    ];

    public static function label()
    {
        return "Student Tests";
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Test Code', 'test_code')
                ->withMeta([
                    'value' => date('YmdHis'),
                ]),

            BelongsTo::make('Student', 'student', Student::class),

            BelongsTo::make('Praktikum', 'praktikum', Praktikum::class),

            Number::make('Score', 'score'),

            HasMany::make('Items', 'items', StudentTestItem::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
