<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('dashboard') }}">{{ env('APP_NAME', 'CMS')  }}</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item">
            <a class="btn btn-outline-light" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>    
    </ul>
</nav>