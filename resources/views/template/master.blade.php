<!DOCTYPE html>
<html>
  @include('template.layouts.header')
  <body>
    <div id="all">
      @include('template.layouts.topbar')
      @include('template.layouts.modals')
      @include('template.layouts.navbar')
      @if(url()->current() == route('pages.home'))
        @include('template.layouts.carousel')
      @endif
      @yield('content')
      @include('template.layouts.footer')
    </div>
    <script src="{{ asset('universal/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('universal/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('universal/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('universal/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('universal/vendor/waypoints/lib/jquery.waypoints.min.js') }}"> </script>
    <script src="{{ asset('universal/vendor/jquery.counterup/jquery.counterup.min.js') }}"> </script>
    <script src="{{ asset('universal/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('universal/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('universal/js/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('universal/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('universal/vendor/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('universal/js/front.js') }}"></script>
     @stack('scripts')
  </body>
</html>