@extends('mahasiswa.layout')
@section('title', 'Petunjuk')
@push('styles')
  <style media="screen">
    .card .card-image {
      height: 250px;
      background-image: url('images/graha-rektorat-um.jpg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      border-top-left-radius: 4px;
      border-top-right-radius: 4px;
    }
  </style>
@endpush
@section('contents')
  <section>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="page-header">
          <h2>Petunjuk</h2>
          <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">Petunjuk</li>
          </ol>
        </div>
        <div class="page-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-image"></div>
                <div class="body">
                  {!! labSetting('petunjuk_contents') !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
