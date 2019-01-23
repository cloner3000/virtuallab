@extends('mahasiswa.layout')
@section('title', 'Petunjuk')
@section('contents')
<section>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="page-header">
        <h2>Edit Profil</h2>
        <ol class="breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('profil') }}">Profil</a></li>
          <li class="active">Edit Profil</li>
        </ol>
      </div>
      <div class="page-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="body">
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
                    <button type="submit" class="btn bg-green btn-block btn-rounded btn-md">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
