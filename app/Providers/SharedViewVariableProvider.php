<?php

namespace App\Providers;

use App\Praktikum;
use App\Setting;
use App\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SharedViewVariableProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $praktikums = Praktikum::all();
            $setting = Setting::where('default', true)->first();

            View::share([
                "praktikums" => $praktikums,
                "setting" => $setting
            ]);
        } catch (QueryException $exception){
            Log::warning($exception->getMessage());
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
