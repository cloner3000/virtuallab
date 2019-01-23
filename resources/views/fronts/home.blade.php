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
<div class="banner">
    <div class="bg-color" style="background-color: rgba(255, 255, 255, 0.90)">
        <div class="row" style="margin: auto 10px;">
            <div class="col-lg-12 banner-text text-center" style="margin-top: 50px;">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aperiam eius facilis fugit ipsum labore nesciunt nihil nobis placeat praesentium, quasi sit totam? Corporis earum facilis fugit itaque saepe?
            </div>
        </div>
    </div>
</div>
<!--/ Banner-->
@endsection
