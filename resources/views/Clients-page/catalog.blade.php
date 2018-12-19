@extends("layouts.app")
@section('meta-tegs')
    <link rel="canonical" href="{{url('/')}}">
@endsection
@section("css_files")
    loadCSS("{{asset('assets/_header.css')}}");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("{{asset('assets/css/_header_admin.css')}}");              //Header Styles (compress & paste to header after release)
    @endif
        loadCSS("{{asset('assets/_main.css')}}");                //User Styles: Main

    loadCSS("{{asset('assets/css/section/_main.css')}}");                //User Styles: Main
    @if($is_admin)
        loadCSS("{{asset('assets/css/_main_admin.css')}}");                //User Styles: Main
    @endif
    loadCSS("{{asset('assets/css/section/_media.css')}}");               //User Styles: Media
    @if($is_admin)
        loadCSS("{{asset('assets/css/_media_admin.css')}}");               //User Styles: Media
    @endif

@endsection



@section('header')
    {!!$header!!}
@endsection

@section('left_sidebar')
    {!!$left_side_bar!!}
@endsection

@section("main_column")
<!-- Main Sherif-Home-->

            <div class="sherif_center_column">
                <!-- include home_messages -->
                @include("layouts.partials.home_messages")
                @include("layouts.partials.top_alert")



                <!--SHERIF SECTION-->
                    <ul class="sherif-breadcrumb">
                      <li><a href="index.html">Главная</a></li>
                      <li><span>Вы здесь <i class="fas fa-arrow-right"></i></span> {{$CurrentCategory->name}}</li>
                    </ul>
                    <div class="sherif_home_main-box_section">
                        @foreach($data as $subcatalog)
                        <div class="sherif_home_main-box_section_itm">
                            <a href="{{route('subCatalog', ['slug'=>$CurrentCategory->slug, 'subslug'=>$subcatalog->slug])}}">
                                <img class="sherif-section_itm-img" src="{{asset('storage/'. $subcatalog->image)}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">{{$subcatalog->name}}<span class="section-number"> (7)</span></span>
                                </p>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    <nav class="">
                            <ul class="pagination-sherif">
                                <li class=""><a href="#"><<</a></li>
                                <li class=""><a href="#"><</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a class="active-sherif" href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#">9</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">20</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">30</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">40</a></li>
                                <li><a class="active-sherif-dots" href="#"></a></li>
                                <li><a href="#">50</a></li>
                                <li><a href="#">></a></li>
                                <li><a href="#">>></a></li>
                            </ul><br>
                            <ul class="pagination-sherif tags-sherif">
                                <li><i class="fas fa-tags"></i></li>
                                <li><a href="#">tag1</a></li>
                                <li><a href="#">tag2</a></li>
                                <li><a href="#">tag3</a></li>
                                <li><a href="#">tag4</a></li>
                                <li><a href="#">tag5</a></li>
                                <li><a href="#">tag6</a></li>
                                <li><a href="#">tag7</a></li>
                                <li><a href="#">tag8</a></li>
                                <li><a href="#">tag9</a></li>
                            </ul>
                            
                        </nav>
                    <!--SHERIF SECTION END-->
            </div>
     
       
@endsection