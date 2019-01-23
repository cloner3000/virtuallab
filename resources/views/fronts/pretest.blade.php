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
    <div class="section-container">
        <h1>Anda belum melakukan Pretest</h1>
        <p>Silahkan mengerjakan soal pretest di bawah ini untuk dapat mengakses sistem ini.</p>
    </div>
    <div class="section-container">
        @isset($items)
            <form action="{{ route('pretest.submit') }}" method="post">
                {{ csrf_field() }}
                @foreach ($items as $key => $item)
                    <input type="hidden" name="soal_id[]" value="{{ $item->soal->id }}">
                    <div class="row">
                        <div class="col-md-1">
                            {{ $key+1 }}.
                        </div>
                        <div class="col-md-11">
                            {!! Markdown::convertToHtml($item->soal->soal) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
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
        @endisset
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
