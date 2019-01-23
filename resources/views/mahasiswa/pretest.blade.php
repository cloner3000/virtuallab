@extends('mahasiswa.layout')
@section('title', 'Home')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush
@section('contents')
<section>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="page-header">
                <h4>{{ $exam->name }}</h4>
                <span>{{ $exam->exam_code }}</span>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Pre Test</li>
                </ol>
            </div>
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div>
                                    {!! Markdown::convertToHtml($exam->description) !!}
                                </div>
                                @if(auth()->user()->asStudent()->alreadyAnswerAllExamItem($exam->id))
                                    <hr>
                                    <div>
                                        <h3>Score : {{ auth()->user()->asStudent()->studentExams()->where('id', $exam->id)->first()->score}}</h3>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('exam.submit', $exam->id) }}" method="post">
                    {{ csrf_field() }}
                    @foreach ($exam->items as $key => $item)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                {!! Markdown::convertToHtml($item->soal->soal) !!}
                                            </div>
                                        </div>
                                        <hr>
                                        @if(auth()->user()->asStudent()->alreadyAnswerExamItem($exam->id, $item->id))
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {!! Markdown::convertToHtml(auth()->user()->asStudent()->getAnswerExamItem($exam->id, $item->id)) !!}
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea name="item[{{ $item->soal->id }}]" rows="8" class="form-control mdeditor"></textarea>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(!auth()->user()->asStudent()->alreadyAnswerAllExamItem($exam->id))
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-rounded btn-block">Submit</button>
                            </div>
                        </div>
                    @endif
                    <br>
                </form>

            </div>
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
