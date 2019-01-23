<aside class="aside">
  <!-- START Sidebar (left)-->
  <div class="aside-inner">
    <nav data-sidebar-anyclick-close="" class="sidebar">
      <!-- START sidebar nav-->
      <ul class="nav menu">
        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
          <a href="{{ route('home') }}" title="Dashboard">
              <em class="material-icons">dashboard</em>
              <span>Dashboard</span>
          </a>
        </li>
        @foreach (praktikum() as $praktikum)
          <li>
            <a href="#{{ $praktikum->slug }}" title="{{ $praktikum->name }}" data-toggle="collapse" class="menu-toggle"><em class="material-icons">class</em><span>{{ $praktikum->name }}</span></a>
            <ul id="{{ $praktikum->slug }}" class="nav sidebar-subnav collapse">
              <li class="sidebar-subnav-header">{{ $praktikum->name }}</li>
              <li><a href="{{ route('praktikum.materi', $praktikum->id) }}" title="Materi"><span>Materi</span></a></li>
              <li><a href="{{ route('praktikum.video', $praktikum->id) }}" title="Vidio"><span>Vidio</span></a></li>
              <li><a href="{{ route('praktikum.test', $praktikum->id) }}" title="Ujian"><span>Ujian</span></a></li>
              <li><a href="{{ route('praktikum.score', $praktikum->id) }}" title="Nilai"><span>Nilai</span></a></li>
            </ul>
          </li>
        @endforeach
        @auth
          @if(auth()->user()->asStudent())
            <li>
              <a href="#exam" title="Exams" data-toggle="collapse" class="menu-toggle">
                <em class="material-icons">assignment</em>
                <span>Exams</span>
              </a>
              <ul id="exam" class="nav sidebar-subnav collapse">
                <li class="sidebar-subnav-header">Exams</li>
                @foreach(auth()->user()->asStudent()->exams as $exam)
                  <li>
                    <a href="{{ route('exam', $exam->id) }}" title="Exam">
                      <span>{{ $exam->name }}</span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>
          @endif
        @endauth
        <li class="{{ Route::currentRouteName() == 'petunjuk' ? 'active' : '' }} visible-xs">
          <a href="{{ route('petunjuk') }}" title="Petunjuk">
              <em class="material-icons">help</em>
              <span>Petunjuk</span>
          </a>
        </li>
        @auth
          <li class="{{ Route::currentRouteName() == 'profil' ? 'active' : '' }} visible-xs">
            <a href="{{ route('profil') }}" title="Profil">
              <em class="material-icons">account_circle</em>
              <span>Profil</span>
            </a>
          </li>
          <li class="visible-xs">
            <a href="#" onclick="$('#logout-form').submit();" title="Logout">
              <em class="material-icons">logout</em>
              <span>Logout</span>
            </a>
          </li>
        @endauth
        @guest
          <li class="visible-xs">
            <a href="{{ route('login') }}" title="Login">
              <em class="material-icons">input</em>
              <span>Login</span>
            </a>
          </li>
        @endguest
      </ul>
      <!-- END sidebar nav-->
    </nav>
  </div>
  <!-- #END# Sidebar (left)-->
</aside>
