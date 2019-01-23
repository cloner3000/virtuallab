<?php

namespace App\Nova;

use App\Nova\Actions\SetDefaultSettings;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

class Setting extends Resource
{
    /**
     * The model's group
     *
     * @var string
     */
    public static $group = "Configurations";

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Setting';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

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

            Text::make('Apps Name', 'app_name'),

            Image::make('Apps Logo', 'app_logo'),

            Markdown::make('Home Content', 'home_contents'),

            Markdown::make('Helper Content', 'petunjuk_contents'),

            Text::make('Copyright Content', 'app_copyright'),

            Boolean::make('Set Default', 'default')
                ->exceptOnForms(),

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
            new SetDefaultSettings(),
        ];
    }
}
