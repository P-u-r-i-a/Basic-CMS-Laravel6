<header class="nav-holder make-sticky">
    <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
        <div class="container"><a href="{{ route('pages.home') }}" class="navbar-brand home"><img src="{{ asset('universal/img/logo.png') }}" alt="Universal logo" class="d-none d-md-inline-block"><img src="{{ asset('universal/img/logo-small.png') }}" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
        <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
        <div id="navigation" class="navbar-collapse collapse">
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown {{ url()->current() == route('pages.home') ? 'active' : ''}}"><a href="{{ route('pages.home') }}">Home <b class="caret"></b></a></li>
                <li class="nav-item dropdown {{ url()->current() == route('pages.blog') ? 'active': ''}}""><a href="{{ route('pages.blog') }}">Blog</b></a></li>
            </ul>
        </div>
        </div>
    </div>
</header>
