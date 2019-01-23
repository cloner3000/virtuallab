<?php

namespace App\Nova;

use App\Nova\Actions\GiveStudentTestItemScore;
use GrahamCampbell\Markdown\Facades\Markdown as GrahamCampbellMarkdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class StudentTestItem extends Resource
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
    public static $model = 'App\StudentTestItem';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'answer';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

    public static function label()
    {
        return 'Student Test Items';
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

            BelongsTo::make('Student Test', 'studentTest', StudentTest::class),

            BelongsTo::make('Soal', 'soal', Soal::class),

            Text::make('Soal (full text)', function () {
                return $this->soal ? $this->soal->soal : '';
            })->hideFromIndex()->hideWhenCreating(),

            Markdown::make('Answer', 'answer'),

            Text::make('Answer', function () {
                return substr(strip_tags(GrahamCampbellMarkdown::convertToHtml($this->answer)), 0, 50) . '...';
            })->onlyOnIndex(),

            Number::make('Score', 'score'),
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
        return [
            new GiveStudentTestItemScore(),
        ];
    }
}
