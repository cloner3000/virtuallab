@extends('fronts.layouts.app')
@section('title', 'Petunjuk')
@push('style')
    <style media="screen">
        .section-container {
            margin: auto 10px
        }
    </style>
@endpush
@section('content')
<section id="profil" class="section-padding">
    <div class="section-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-section text-center">
                    <h2>Profil Mahasiswa</h2>

                    <hr class="bottom-line">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="header-section">
                    <div class="section-container">
                        <form action="{{ route('profil.edit.post', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Avatar</label>
                                <input class="form-control" type="file" name="avatar">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label>Password (leave blank if don't want to change your password)</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
