@push('scripts')
    <script src="{{asset('trumbowyg/trumbowyg.min.js')}}"></script>  
    <script>
        $('#editor').trumbowyg({
        resetCss: true
    });
    </script>
@endpush

@push('styles')
    <link href="{{asset('trumbowyg/ui/trumbowyg.min.css')}}" rel="stylesheet">
@endpush