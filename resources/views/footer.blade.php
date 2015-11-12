
<!-- Mainly scripts -->
    <script src="{{ asset('/js/vendor.min.js') }}"></script>


@if(\Auth::user()->isNew())
    <script src="{{ asset('/ss/js/scripts/tour.js') }}"></script>
@endif

@yield('jquery_scripts')

{!! Toastr::render() !!}


<script src="{{ asset('/js/my.min.js') }}"></script>

@yield('script')
