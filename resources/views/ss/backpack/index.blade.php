@extends('layout')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            @include('ss.backpack.partials._backpack_nav')
            @include('ss.backpack.partials._files_list')
        </div>
    </div>

    <!-- File Upload Modal -->
    @include('ss.backpack.partials._file_upload_modal')
    <!-- End File Upload Modal -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>
@endsection