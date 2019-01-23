@extends('mahasiswa.layout')
@section('title', 'Materi Praktikum')
@section('contents')
<section>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="page-header">
        <h2>Materi : {{ $praktikum->name }}</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">Materi</li>
        </ol>
      </div>
      <div class="page-body">
        @foreach ($praktikum->materi as $materi)
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>{{ $materi->title }}</h4>
                </div>
                <div class="body">
                  <div class="row">
                    <div class="col-lg-5">
                      {!! Markdown::convertToHtml($materi->contents) !!}
                    </div>
                    <div class="col-lg-7">
                      <object data="{{ Storage::url($materi->file) ?: '' }}" type="application/pdf" width="100%" height="640px">
                        <p>Your web browser doesn't have a PDF plugin.
                        Instead you can <a href="{{ Storage::url($materi->file) ?: '' }}">click here to
                        download the PDF file.</a></p>
                      </object>
                      <p>Materi dapat didownload pada <a href="{{ Storage::url($materi->file) }}">link ini</a>.</p>
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
