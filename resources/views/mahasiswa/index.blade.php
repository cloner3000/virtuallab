@extends('mahasiswa.layout')

@push('styles')
  <style media="screen">
    .text-white {
      color: white;
    }
    .home-vl {
      background-image: url('images/graha-rektorat-um.jpg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      height: 250px;
      padding: 70px 0px;
    }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.75);
      border-radius: 4px;
      padding: 70px 0;
    }
  </style>
@endpush

@section('contents')
<section>
  <!-- Page content-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="page-header">
        <ol class="breadcrumb">
          <li class="active">Home</li>
        </ol>
      </div>
      <div class="body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card home-vl">
              <div class="overlay">
                <div class="body text-center">
                  <h2 class="text-white">Selamat Datang, {{ auth()->user() ? auth()->user()->name : 'Guest' }}</h2>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="body">{!! labSetting('home_contents') !!}</div>
            </div>
          </div>
        </div>

        <div class="row">
          @foreach (praktikum() as $praktikum)
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h3>{{ $praktikum->name }}</h3>
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-sm-6">
                      <a href="{{ route('praktikum.materi', $praktikum->id) }}" role="button" class="btn btn-block bg-indigo btn-lg text-center btn-rounded">
                        <i class="material-icons">book</i> <span>Materi</span>
                      </a>
                    </div>
                    <div class="col-sm-6">
                      <a href="{{ route('praktikum.video', $praktikum->id) }}" role="button" class="btn btn-block bg-red btn-lg text-center btn-rounded">
                        <i class="material-icons">play_circle_filled</i> <span>Vidio</span>
                      </a>
                    </div>
                    <div class="col-sm-6">
                      <a href="{{ route('praktikum.test', $praktikum->id) }}" role="button" class="btn btn-block bg-orange btn-lg text-center btn-rounded">
                        <i class="material-icons">extension</i> <span>Ujian</span>
                      </a>
                    </div>
                    <div class="col-sm-6">
                      <a href="{{ route('praktikum.score', $praktikum->id) }}" role="button" class="btn btn-block bg-green btn-lg text-center btn-rounded">
                        <i class="material-icons">grade</i> <span>Nilai</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')

@endpush
