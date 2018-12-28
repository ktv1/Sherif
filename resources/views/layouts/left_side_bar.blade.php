<div class="sherif_left_column">
    <div class="sherif_sidebar_catalog">
        <div class="sherif_sidebar_catalog-title">
            <h2>Каталог:</h2>
        </div>

        @if ($isadm > 0)
            <div class="sherif_sidebar_catalog_info">
                <ul>
                    <li><small><span>Всего товаров: </span><strong>{{\App\Product::all()->count()}}</strong></small></li>
                    <li><small><span>Всего актуальных товаров: </span><strong>{{\App\Product::active()->count()}}</strong></small></li>
                    <li><small><span>Всего в наличии: </span><strong>{{\App\Product::instock()->count()}}</strong></small></li>
                </ul>
            </div>
        @endif
        <div class="sherif_sidebar_catalog-content">
            <!-- <div id="accordion" class="panel-group promotion">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#catalog_promotions" data-parent="#accordion" data-toggle="collapse"><span></span>Акции</a>
                            <span class="sherif_sidebar_catalog-content_amount">
	                                    	(5)
	                                    </span>
                        </h4>
                    </div>
                    <div id="catalog_promotions" class="panel-collapse collapse out">
                        <div class="panel-body">
                            <div class="link_box">
                                <a id="edit_profile_user">Text</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            @foreach($Global_category as $gc)
                @if($status != "None" && $status == $gc->slug)
                    <?php  $toggle = "in" ?>
                @else
                    <?php  $toggle = "out" ?>
                @endif
                
                <div id="accordion" class="panel-group">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{route('slug', ['slug'=>$gc->slug])}}">{{$gc->name}}</a>
                                <a href="#catalog_{{$gc->slug}}" data-parent="#accordion" data-toggle="collapse"><span></span><i class="fas fa-sort-down"></i></a>
                                <span class="sherif_sidebar_catalog-content_amount">({{$gc->product_count}})</span>
                            </h4>
                        </div>
                        <div id="catalog_{{$gc->slug}}" class="panel-collapse collapse {{$toggle}}">
                            <div class="panel-body">
                                <ul>
                                    @foreach($Sub_category as $sc)
                                        @if(($gc->id == $sc->parent_id))
                                            <li><div class="link_box">
                                            <a href="{{route('slug', ['slug'=>$gc->slug . '/' . $sc->slug])}}"
                                               id="edit_profile_user">{{$sc->name}}</a>
                                            <span class="sherif_sidebar_catalog-content_panel_amount">
                                                ({{$sc->product_count}})
                                            </span>
                                             </div></li>
                                            @php
                                                $childcat = \App\Category::where('parent_id',$sc->id)->get();
                                            @endphp
                                            @if($childcat)
                                                @if(Request::segment(1) == $sc->slug)
                                                    <ul>
                                                    @foreach($childcat as $ssc)
                                                        <li a href="{{route('slug',[$gc->slug . '/' . $ssc->slug])}}">{{$ssc->name}}</li>
                                                    @endforeach
                                                    </ul>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>     
</div>
