@extends('fronts.layouts.app')
@section('title', 'Home')
@push('style')
    <style media="screen">
        .section-container {
            margin: auto 10px
        }
    </style>
@endpush
@section('content')
    <div class="section-container">
        <h1>Anda sudah melakukan Pretest</h1>
        <p>Silahkan mengkonfirmasi dosen anda untuk segera mendapatkan review dari pretest anda.</p>
    </div>
@endsection
