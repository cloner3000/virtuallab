@extends('fronts.layouts.app')
@section('title', 'Score Praktikum')
@section('content')
<div class="container-fluid" style="min-height: calc(100vh - 130px)">
    <br><br>
    <h2>Nilai Test Praktikum {{ $praktikum->name }}</h2>
    <div class="text-center">
        @foreach ($praktikum->exams as $exam)
            @foreach ($exam->examinations as $test)
                @if ($test->user_id == auth()->user()->id)
                    <hr>
                    <h6>Kode : {{ $test->examination_code }}</h6>
                    <h6>Tanggal : {{ $test->created_at }}</h6>
                    @if ($test->total_score)
                        <h4>Hasil Test Anda : </h4>
                        <h1>{{ $test->total_score }}pt</h1>
                    @else
                        <p>Score anda belum tersedia.</p>
                    @endif
                    <hr>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
@endsection
