<?php

function labSetting($setting) {
    $defaultSetting = \App\Setting::where('default', true)->first();

    switch ($setting) {
        case 'app_name':
            return $defaultSetting ? $defaultSetting->app_name : config('app.name');
            break;
        case 'app_logo':
            return $defaultSetting ? Storage::url($defaultSetting->app_logo) : asset('images/logo.png');
            break;
        case 'app_copyright':
            return $defaultSetting ? $defaultSetting->app_copyright : 'Copyright 2018. All right reserved.';
            break;
        case 'home_contents':
            return $defaultSetting ? \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($defaultSetting->home_contents) : '<p>Amet veniam viverra! Ornare, voluptatibus turpis, dicta eius ex error. Doloremque debitis? Molestias? Porttitor hendrerit, ullamco elit, a. Nonummy, excepteur integer ligula erat molestias erat mollit commodi consequatur, dolore voluptatem, velit et fermentum, iusto possimus nobis aptent ac molestiae quo, elementum eleifend turpis cumque eius cras, dictumst dolorem. Minus distinctio.</p>';
            break;
        case 'petunjuk_contents':
            return $defaultSetting ? \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($defaultSetting->petunjuk_contents) : '<p>Amet veniam viverra! Ornare, voluptatibus turpis, dicta eius ex error. Doloremque debitis? Molestias? Porttitor hendrerit, ullamco elit, a. Nonummy, excepteur integer ligula erat molestias erat mollit commodi consequatur, dolore voluptatem, velit et fermentum, iusto possimus nobis aptent ac molestiae quo, elementum eleifend turpis cumque eius cras, dictumst dolorem. Minus distinctio.</p>';
            break;
    }
}

function praktikum() {
    $praktikum = new \Illuminate\Database\Eloquent\Collection();
    if (auth()->check()) {
        $student = \App\Student::find(auth()->user()->id);
        if ($student) {
            $praktikum = $student->praktikum;
        }
    }
    return $praktikum;
}