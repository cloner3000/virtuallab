@extends('mahasiswa.layout')
@section('title', 'Profil')
@push('styles')
  <style media="screen">
    .avatar img {
      width: 50vh;
    }
  </style>
@endpush
@section('contents')
<section>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="page-header">
        <h2>Profil</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">Profil</li>
        </ol>
      </div>
      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="bg-green padding-20 b-t-radius">
                <div class="avatar">
                  <img src="{{ auth()->user()->gravatar(200) }}" class="border-trans">
                </div>
              </div>
              <div class="body text-center">
                <h4 class="card-title m-t-10">{{ auth()->user()->name }}</h4>
                <h6 class="card-subtitle">{{ auth()->user()->email }}</h6>
              </div>
              <div class="card-footer-bordered padding-20">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="align-center">
                      <a href="{{ route('profil.edit', auth()->user()->id) }}" role="button" class="btn btn-rounded btn-block bg-green btn-lg font-20">Edit Profil</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
