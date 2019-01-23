@extends('fronts.layouts.app')
@section('title', 'Petunjuk')
@push('style')
    <style media="screen">
        .section-container {
            margin: auto 10px
        }
        ol {
            list-style: inherit;
        }
        ul {
            list-style: inherit;
        }
    </style>
@endpush
@section('content')
<!--Feature-->
<section class="section-padding">
    <div class="section-container">
        {!! setting('site.home_petunjuk') !!}
    </div>
</section>
<!--/ feature-->
@endsection
