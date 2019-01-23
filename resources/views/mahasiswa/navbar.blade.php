<style media="screen">
  .topnavbar .navbar-header .brand-logo-fixed {
    display: block;
    padding: 10px 15px;
    text-align: center;
  }
  .topnavbar .navbar-header .brand-logo-fixed img{
    display: inline;
  }
</style>

<header class="topnavbar-wrapper">
    <nav role="navigation" class="navbar topnavbar">
        <!-- START navbar header-->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
                <div class="brand-logo-fixed">
                    <img src="{{ labSetting('app_logo') }}" alt="{{ labSetting('app_name') }}" height="45px">
                </div>
            </a>
        </div>
        <!-- END navbar header-->
        <!-- START Nav wrapper-->
        <div class="nav-wrapper">
            <!-- START Left navbar-->
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" data-trigger-resize="" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="material-icons">menu</em>
                    </a>
                    <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="material-icons">menu</em>
                    </a>
                </li>
            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="hidden-xs">
                    <a href="{{ route('petunjuk') }}" title="Petunjuk">
                        <em class="material-icons">help</em>
                    </a>
                </li>
                @auth
                    <li class="hidden-xs">
                        <a href="{{ route('profil') }}" title="Profil">
                            <em class="material-icons">account_circle</em>
                        </a>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" onclick="$('#logout-form').submit();" title="Logout">
                            <em class="material-icons">logout</em>
                        </a>
                    </li>
                @endauth
                @guest
                    <li class="hidden-xs">
                        <a href="{{ route('login') }}" title="Login">
                            <em class="material-icons">input</em>
                        </a>
                    </li>
                @endguest
            </ul>
            <!-- #END# Right Navbar-->
        </div>
        <!-- #END# Nav wrapper-->
    </nav>
    <!-- END Top Navbar-->
</header>
<form id="logout-form" action="{{ route('logout') }}" method="post">
    {{ csrf_field() }}
</form>
