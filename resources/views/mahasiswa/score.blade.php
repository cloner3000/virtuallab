@extends('mahasiswa.layout')
@section('title', 'Nilai Praktikum')
@section('contents')
  <section>
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="page-header">
          <h2>Nilai : {{ $praktikum->name }}</h2>
          <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">Nilai</li>
          </ol>
        </div>
        <div class="page-body">
          @foreach($studentTest as $test)
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="body text-center">
                    <h6>Kode : {{ $test->test_code }}</h6>
                    <h6>Tanggal : {{ $test->created_at }}</h6>
                    @if ($test->score)
                      <h4>Hasil Test Anda : </h4>
                      <h1>{{ $test->score }}pt</h1>
                    @else
                      <p>Score anda belum tersedia.</p>
                    @endif
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
