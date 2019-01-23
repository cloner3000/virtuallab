@extends('fronts.layouts.app')
@section('title', 'Video Praktikum')
@section('content')
<div class="container-fluid">
    @foreach ($praktikum->attachments as $key => $video)
        <div class="row" style="padding-top: 25px;">
            <div class="col-md-12">
                <h2>{{ $video->name }}</h2>
            </div>
        </div>
        <div class="row">
            @php
                $file = json_decode($video->file)[0];
            @endphp
            <div class="col-md-7">
                <video width="100%" controls> <source src="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" type="video/mp4"></video>
            </div>
            <div class="col-md-5">
                {!! Markdown::convertToHtml($video->description) !!}
            </div>
        </div>
    @endforeach
</div>
@endsection
