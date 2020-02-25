
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME', 'CMS')  }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @stack('styles')
  </head>
  <body>
    @include('dashboard.navbar')
    @include('dashboard.sidebar')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-5">
      <div class="mt-3">
          @yield('content')
      </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
