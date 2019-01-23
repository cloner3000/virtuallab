@extends('fronts.layouts.app')
@section('title', 'Test Praktikum')
@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    @if ($praktikum->postExam == null)
        <p>No exam available for this lecture. Please contacts your lecturer.</p>
    @else
        <h2>{{ $praktikum->postExam->name }}</h2>
        <p>Jawablah semua pertanyaan di bawah ini:</p>
        <hr>
        <form action="{{ route('praktikum.answer', ['praktikumId' => $praktikum->id, 'examId' => $praktikum->postExam->id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="exam_id" value="{{ $praktikum->postExam->id }}">
            @foreach ($praktikum->postExam->items as $key => $item)
                <div class="row">
                    <div class="col-md-1">
                        {{ $key+1 }}.
                    </div>
                    <div class="col-md-11">
                        {!! Markdown::convertToHtml($item->soal) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <input type="hidden" name="soal_id[]" value="{{ $item->id }}">
                        <textarea name="answer[]" rows="8" class="form-control mdeditor"></textarea>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection

@push('script')
    <script type="text/javascript">
        $('.mdeditor').each(function() {
            var simplemde = new SimpleMDE({
                element: this,
            });
            simplemde.render();
        });
    </script>
@endpush
