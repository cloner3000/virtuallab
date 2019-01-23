<div class="w3-sidebar w3-bar-block" style="width: 15%; border-right: 1px solid #c4c4c4;">
    @isset($availablePraktikums)
        @foreach ($availablePraktikums as $key => $praktikum)
            <button onclick="myFunction('prak{{ $key }}')" class="w3-button w3-block w3-left-align w3-green">{{ $praktikum->name }}</button>
            <div id="prak{{ $key }}" class="w3-hide w3-container">
                <li><a href="{{ route('praktikum.materi', $praktikum->id) }}">Materi</a></li>
                <li><a href="{{ route('praktikum.video', $praktikum->id) }}">Video</a></li>
                <li><a href="{{ route('praktikum.test', $praktikum->id) }}">Test</a></li>
                <li><a href="{{ route('praktikum.score', $praktikum->id) }}">Nilai</a></li>
            </div>
        @endforeach
    @endisset
</div>
