
<nav class="navbar navbar-expand-sm fixed-top navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand navbar-white"><i class="fas fa-baby-carriage navbar-white"></i> 2-MAMA
            {{--{{ config('app.name', 'Laravel') }}--}}
        </a>

        <button type="button" id="sidebar-collapse" class="btn btn-lg sidebar-toggler">
            <i class="fas fa-bars" style="color:lightslategrey"></i>
        </button>

    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav-wrap navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link-header" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link-header" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link-header dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
@push('custom-js')
    <script>
        window.addEventListener('load', function() {
            let button = document.querySelector('#sidebar-collapse');
            button.addEventListener('click', toggleSidebar, false);

            function toggleSidebar(){
                document.getElementById('sidebar').classList.toggle('hide-sidebar');
                document.querySelector('.navbar-brand').classList.toggle('navbar-white');
                document.querySelector('.fa-baby-carriage').classList.toggle('navbar-white');


            }
        })
    </script>
@endpush
