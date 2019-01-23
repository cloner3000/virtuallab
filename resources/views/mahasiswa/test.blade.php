@extends('mahasiswa.layout')
@section('title', 'Test Praktikum')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@section('contents')
<section>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="page-header">
        <h2>Ujian : {{ $praktikum->name }}</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="active">Ujian</li>
        </ol>
      </div>
      <div class="page-body">
        @if ($praktikum->soal == null)
        <p>No exam available for this lecture. Please contacts your lecturer.</p>
        @else
        <div class="row">
          <div class="col-md-8">
            <p>Jawablah semua pertanyaan di bawah ini:</p>
          </div>
          <div class="col-md-4 text-right">
            <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
          </div>
        </div>
        <hr>
        <form action="{{ route('praktikum.test.post', $praktikum->id) }}" method="post">
          {{ csrf_field() }}
          @foreach ($praktikum->soal as $key => $item)
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="body">
                    <div class="row">
                      <div class="col-md-12">
                        {!! Markdown::convertToHtml($item->soal) !!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <textarea name="items[{{ $item->id }}]" rows="8" class="form-control mdeditor"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          <div class="row">
            <div class="col-md-12 text-center">
              <button type="submit" class="btn btn-primary btn-rounded btn-block btn-lg">Submit</button>
            </div>
          </div>
        </form>
        @endif
      </div>
      <br>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script type="text/javascript">
  $('.mdeditor').each(function() {
    var simplemde = new SimpleMDE({
      element: this,
    });
    simplemde.render();
  });
</script>
@endpush
