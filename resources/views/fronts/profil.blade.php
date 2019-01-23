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
    <div class="container">
        <div class="row">
            <div class="header-section text-center">
                <h2>Profil Mahasiswa</h2>

                <hr class="bottom-line">
            </div>
            <div class="header-section text-center">
                <div class="pm-staff-profile-container">
                    <div class="pm-staff-profile-image-wrapper text-center">
                        <div class="pm-staff-profile-image" style="
                          background-image: url('{{ asset(Storage::url(auth()->user()->avatar)) }}');
                          background-repeat: no-repeat;
                          background-position: center;
                          background-size: cover;
                        "></div>
                        </div>
                        <div class="pm-staff-profile-details text-center">
                            <p class="pm-staff-profile-name">{{ auth()->user()->name }}</p>
                            <p>{{ auth()->user()->email }}</p>
                            <a href="{{ route('profil.edit', auth()->user()->id) }}">edit profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
