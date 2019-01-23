<?php

namespace App\Nova;

use App\Nova\PivotFields\StudentPraktikumFields;
use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

class Praktikum extends Resource
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
    public static $model = 'App\Praktikum';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'code' => 'like',
        'name' => 'like',
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

            Text::make('Code', 'code'),

            TextWithSlug::make('Name', 'name')
                ->slug('Slug'),

            Slug::make('Slug', 'slug'),

            Markdown::make('Description', 'description'),

            HasMany::make('Materi', 'materi', Materi::class),

            HasMany::make('Video', 'video', Video::class),

            HasMany::make('Soal', 'soal', Soal::class),

            BelongsToMany::make('Students', 'students', Student::class)
                ->fields(new StudentPraktikumFields())
                ->referToPivotAs('user_praktikum'),

            HasMany::make('Student Test', 'studentTest', StudentTest::class),
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
