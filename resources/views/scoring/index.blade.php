@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.'Scoring')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ 'voyager-medal-rank-star' }}"></i> {{ 'Scoring' }}
            {{ request('praktikum') ? ' | '.$praktikumDetail->name : '' }}
            {{ request('exam') ? ' | '.$examDetail->name : '' }}
            {{ request('test') ? ' | '.$examinationDetail->examination_code : '' }}
        </h1>

        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                @isset($praktikums)
                    @if ($praktikums)
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <h4>Praktikum</h4>
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($praktikums as $praktikum)
                                                <tr>
                                                    <td>{{ $praktikum->name }}</td>
                                                    <td>{{ $praktikum->slug }}</td>
                                                    <td>{{ $praktikum->description }}</td>
                                                    <td>
                                                        <a href="?praktikum={{ $praktikum->id }}" role="button" class="btn btn-primary">Choose</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endisset
                @isset($exams)
                    @if ($exams)
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <h4>Exam</h4>
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Exam Type</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exams as $exam)
                                                <tr>
                                                    <td>{{ $exam->examType->name }}</td>
                                                    <td>{{ $exam->name }}</td>
                                                    <td>{{ $exam->description }}</td>
                                                    <td>
                                                        <a href="?praktikum={{ request('praktikum') }}&exam={{ $exam->id }}" role="button" class="btn btn-primary">Choose</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endisset
                @isset($examinations)
                    @if ($examinations)
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <h4>Exam</h4>
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Examination Code</th>
                                                <th>Mahasiswa</th>
                                                <th>Total Score</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($examinations as $test)
                                                <tr>
                                                    <td>{{ $test->examination_code }}</td>
                                                    <td>{{ $test->user->name }}</td>
                                                    <td>{{ $test->total_score }}</td>
                                                    <td>
                                                        <a href="?praktikum={{ request('praktikum') }}&exam={{ request('exam') }}&test={{ $test->id }}" role="button" class="btn btn-success">Give Score</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                @endisset
                @isset($examinationItems)
                    <form action="{{ route('admin.scoring.save') }}" method="post">
                        {{ csrf_field() }}
                        <div class="panel panel-deafult">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Praktikum</label>
                                    <input readonly class="form-control" type="text" value="{{ $praktikumDetail->name }}">
                                    <input type="hidden" name="praktikum_id" value="{{ $praktikumDetail->id }}">
                                </div>
                                <div class="form-group">
                                    <label>Exam</label>
                                    <input readonly class="form-control" type="text" value="{{ $examDetail->name }}">
                                    <input type="hidden" name="exam_id" value="{{ $examDetail->id }}">
                                </div>
                                <div class="form-group">
                                    <label>Examination</label>
                                    <input readonly class="form-control" type="text" value="{{ $examinationDetail->examination_code }}">
                                    <input type="hidden" name="examination_id" value="{{ $examinationDetail->id }}">
                                </div>
                                <div class="form-group">
                                    <label>Mahasiswa</label>
                                    <input readonly class="form-control" type="text" value="{{ $examinationDetail->user->name }}">
                                    <input type="hidden" name="user_id" value="{{ $examinationDetail->user->id }}">
                                </div>
                            </div>
                        </div>
                        @foreach ($examinationItems as $item)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <input type="hidden" name="examination_item_id[]" value="{{ $item->id }}">
                                    <div class="col-lg-5">
                                        <label>Soal</label>
                                        <div class="panel panel-default"><div class="panel-body" style="zoom: 0.75">{!! Markdown::convertToHtml($item->soal->soal) !!}</div></div>
                                    </div>
                                    <div class="col-lg-5">
                                        <label>Jawaban</label>
                                        <div class="panel panel-default"><div class="panel-body">{!! Markdown::convertToHtml($item->answer) !!}</div></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Score</label>
                                            <input type="number" name="score[]" value="{{ $item->score }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <p>Apakah anda sudah selesai melakukan peneilaian? Jika sudah silahkan klik tombol "Simpan".</p>
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endisset
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.rawgit.com/showdownjs/showdown/<version tag>/dist/showdown.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var converter = new showdown.Converter(),
                textSoal = $('#markdownsoal').val(),
                htmlSoal = converter.makeHtml(textSoal);
            $('#soalHtml').append(htmlSoal);
        });
    </script>
@stop
