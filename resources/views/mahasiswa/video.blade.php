@extends('mahasiswa.layout')
@section('title', 'Video Praktikum')
@section('contents')
  <section>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="page-header">
          <h2>Vidio : {{ $praktikum->name }}</h2>
          <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">Vidio</li>
          </ol>
        </div>
        <div class="page-body">
          @foreach ($praktikum->video as $video)
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>{{ $video->name }}</h4>
                  </div>
                  <div class="body">
                    <div class="row">
                      <div class="col-lg-5">
                        {!! Markdown::convertToHtml($video->description) !!}
                      </div>
                      <div class="col-lg-7">
                        <iframe width="100%" height="350px"
                          src="https://youtube.com/embed/{{ $video->video }}">
                        </iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
@endsection
