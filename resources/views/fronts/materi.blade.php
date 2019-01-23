@extends('fronts.layouts.app')
@section('title', 'Materi Praktikum')
@section('content')
<div class="container-fluid">
    @foreach ($praktikum->materis as $materi)
        <div class="row">
            <div class="materi-text text-center">
                <h3>{{ $materi->title }}</h3>
                @php
                    $file = json_decode($materi->file)[0];
                @endphp
                <embed src="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" type="application/pdf" width="80%" height="600px"></embed>
            </div>
            <hr>
        </div>
    @endforeach
</div>
@endsection
