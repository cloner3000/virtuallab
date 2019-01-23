<?php

namespace App\Nova;

use App\Soal as Model;
use GrahamCampbell\Markdown\Facades\Markdown as GrahamCampbellMarkdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Soal extends Resource
{
    /**
     * The model's group
     *
     * @var string
     */
    public static $group = "Praktikum Managements";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Model::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @return string
     */
    public function title()
    {
        return substr(strip_tags(GrahamCampbellMarkdown::convertToHtml($this->soal)), 0, 50) . '...';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'soal'
    ];

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

            BelongsTo::make('Praktikum', 'praktikum', Praktikum::class),

            Text::make('Soal', function () {
                $soal = substr(strip_tags(GrahamCampbellMarkdown::convertToHtml($this->soal)), 0, 75) . '...';
                return $soal;
            })->onlyOnIndex(),

            Markdown::make('Soal', 'soal')
                ->alwaysShow(),

            Textarea::make('Correct Answer', 'correct_answer')
                ->alwaysShow(),

            Boolean::make('Show', 'show'),
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
