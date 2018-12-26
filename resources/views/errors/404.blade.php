@extends("layouts.app")
@section('meta-tegs')
    <link rel="canonical" href="{{url('/')}}">
@endsection
@section("css_files")
    loadCSS("{{asset('assets/_header.css')}}");//Header Styles (compress & paste to header after release)
    @if($isadm)
        loadCSS("{{asset('assets/css/_header_admin.css')}}");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("{{asset('assets/_main.css')}}");                //User Styles: Main

    loadCSS("{{asset('assets/css/section/_main.css')}}");                //User Styles: Main
    @if($isadm)
        loadCSS("{{asset('assets/css/_main_admin.css')}}");                //User Styles: Main
    @endif
    loadCSS("{{asset('assets/css/section/_media.css')}}");               //User Styles: Media
    @if($isadm)
        loadCSS("{{asset('assets/css/_media_admin.css')}}");               //User Styles: Media
    @endif

@endsection



@section('header')
    {{-- $header --}}
@endsection

@section('left_sidebar')
    {{-- $left_side_bar--}}
@endsection

@section("main_column")

    <div class="contain">

        <div class="content">
            <h1>Error 404! Такая страница не найдена!</h1>
        </div>
    </div>

@endsection