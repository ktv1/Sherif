@section("main_banner")
    <div class="sherif_home_main-box_slider slider">
    @if (isset($banner))
        @foreach($banner->bannerImages as $key => $bannerImage)
            @php
                $bannerposition = \App\Models\BannerImages::i()->getBannerImageLink($bannerImage->id);
           // dd($bannerposition)
            @endphp
            <div class="slide item">
                <div class="slide-content" style="background-image: url('{{Illuminate\Support\Facades\Storage::url(get_image_cache($bannerImage->image, $banner->width, $banner->height))}}')">
                    @if (($bannerImage->type == '1-1') && isset($bannerImage->bannerLinkPosition[0]))
                        <a href="{{$bannerImage->bannerLinkPosition[0]->link}}">
                            <div class="col-sm-12" style="background-color: #0a2b1d; position: absolute; left: 0; height: 100%; opacity: 0.2;">
                                <!--<img class="d-block w-100"  alt="First slide [800x400]" src="{{asset('/assets/img/slider/FirstSlide.png')}}" data-holder-rendered="true">-->
                            </div>
                        </a>
                    @elseif (($bannerImage->type == '2-2') && (isset($bannerposition[7])) && (isset($bannerposition[8])))
                        <a href="{{$bannerposition[7]}}">
                            <div class="col-sm-6" style="background-color: #0a2b1d; position: absolute; left: 0; height: 100%; opacity: 0.2;">

                            </div>
                        </a>
                        <a href="{{$bannerposition[8]}}">
                            <div class="col-sm-6" style="background-color: #1a0dab; position: absolute; right: 0; height: 100%; opacity: 0.2">

                            </div>
                        </a>
                        <!--<img class="d-block w-100" src="{{Illuminate\Support\Facades\Storage::url(get_image_cache($bannerImage->image, $banner->width, $banner->height))}}" alt="First slide"  data-holder-rendered="true">-->
                    @elseif (($bannerImage->type == '6-6') /*&& (isset($bannerposition[1])) && (isset($bannerposition[2]))*/)
                        <div class="col-sm-6" style="position: absolute; left: 0; height: 100%;">
                            <a href="{{$bannerposition[1]}}">
                                <div class="col-sm-12" style="background-color: #042b01; position: relative; left: 0; height: 33.3333%; opacity: 0.2;">

                                </div>
                            </a>
                            <a href="{{$bannerposition[2]}}">
                                <div class="col-sm-12" style="background-color: #00ab1b; position: relative; left: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                            <a href="{{$bannerposition[3]}}">
                                <div class="col-sm-12" style="background-color: #1a0dab; position: relative; left: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6" style="position: absolute; right: 0; height: 100%;">
                            <a href="{{$bannerposition[4]}}">
                                <div class="col-sm-12" style="background-color: #042b01; position: relative; right: 0; height: 33.3333%; opacity: 0.2;">

                                </div>
                            </a>
                            <a href="{{$bannerposition[5]}}">
                                <div class="col-sm-12" style="background-color: #00ab1b; position: relative; right: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                            <a href="{{$bannerposition[6]}}">
                                <div class="col-sm-12" style="background-color: #1a0dab; position: relative; right: 0; height: 33.3333%; opacity: 0.2">

                                </div>
                            </a>
                        </div>
                        <!--<img class="d-block w-100" src="{{Illuminate\Support\Facades\Storage::url(get_image_cache($bannerImage->image, $banner->width, $banner->height))}}" alt="First slide" data-holder-rendered="true">-->
                    @else
                    <!--Slide start-->
                        <div class="slide item">
                            <div class="slide-content" style="background-image: url('{{asset('/assets/img/slider/FirstSlide.png')}}');">
                            </div>
                        </div>
                        <!--Slide end -->
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <!--Slide start-->
            <div class="slide item">
                <div class="slide-content" style="background-image: url('{{asset('/assets/img/slider/FirstSlide.png')}}');">
                </div>
            </div>
            <!--Slide end -->
    @endif
    </div>
@show