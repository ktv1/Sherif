@extends("layouts.app")
@section("css_files")
    loadCSS("assets/_header.css");//Header Styles (compress & paste to header after release)
    @if($is_admin)
        loadCSS("assets/css/_header_admin.css");              //Header Styles (compress & paste to header after release)
    @endif
    loadCSS("assets/_main.css");                //User Styles: Main
    loadCSS("assets/css/section/_main.css");                //User Styles: Main
    @if($is_admin)
        loadCSS("assets/css/_main_admin.css");                //User Styles: Main
    @endif
    loadCSS("assets/css/section/_media.css");               //User Styles: Media
    @if($is_admin)
        loadCSS("assets/css/_media_admin.css");               //User Styles: Media
    @endif

@endsection

@section("main_column")
<!-- Main Sherif-Home-->

            <div class="sherif_center_column">
                <!-- include home_messages -->
                @include("layouts.partials.home_messages")



                <!--SHERIF SECTION-->
                    <ul class="sherif-breadcrumb">
                      <li><a href="index.html">Главная</a></li>
                      <li><span>Вы здесь <i class="fas fa-arrow-right"></i></span>  Военное снаряжение, обмундирование, бронежилеты</li>
                    </ul>
                    <div class="sherif_home_main-box_section">
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section1.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Аптечки и первая помощь<span class="section-number"> (7)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section2.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Балаклавы<span class="section-number"> (12)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section3.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link" class="category-link">Берцы и другая военная обувь<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section4.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Бронежилеты<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section5.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Бронепластины, кевлар, бронесумки<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section6.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Военная форма и камуфляж<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section7.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Фурнитура форменная<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section8.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Гидраторы и питьевые системы<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
                        </div>
                        <div class="sherif_home_main-box_section_itm">
                            <a href="#">
                                <img class="sherif-section_itm-img" src="{{asset('/assets/img/section/section9.png')}}" alt="">
                                <p class="section-title">
                                    <span class="category-link">Головные уборы<span class="section-number"> (45)</span></span>
                                </p>
                            </a>
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
                    </div>
                    <!--SHERIF SECTION END-->
            </div>
     
       
@endsection

