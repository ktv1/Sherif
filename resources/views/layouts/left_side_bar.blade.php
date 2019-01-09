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
                @if (isset($CurrentCategory))
                    @php
                        $path = explode('_',$CurrentCategory->path);
                        if (count($path) > 0) {
                            if (($path[0] == 0)) {
                                $path_id = $CurrentCategory->id;
                            } else {
                                $path_id = $path[0];
                            }
                        }
                    @endphp
                    @if($status != "None" && $gc->id == $path_id)
                        <?php  $toggle = "in" ?>
                    @else
                        <?php  $toggle = "out" ?>
                    @endif
                @else
                    <?php $toggle = "out" ?>
                    <?php $CurrentCategory = new \StdClass(); $CurrentCategory->id = 0; $CurrentCategory->path = ''; ?>
                @endif
                <div id="accordion" class="panel-group">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{route('slug', ['slug'=>$gc->slug])}}" style="{{($CurrentCategory->id == $gc->id) ? 'font-weight: 600;' : ''}}">{{$gc->name}}</a>
                                <a href="#catalog_{{$gc->slug}}" data-parent="#accordion" data-toggle="collapse"><span></span><i class="fas fa-sort-down"></i></a>
                                <span class="sherif_sidebar_catalog-content_amount">({{$gc->product_count}})</span>
                            </h4>
                        </div>
                        @if($gc->child)
                        <div id="catalog_{{$gc->slug}}" class="panel-collapse collapse {{$toggle}}">
                            <div class="panel-body">
                                <ul>
                                        @foreach($gc->child as $sc)
                                            {{--@if(($gc->id == $sc->parent_id))--}}
                                                <li><div class="link_box">
                                                <a href="{{route('slug', ['slug'=>$gc->slug . '/' . $sc->slug])}}"
                                                   style="{{($CurrentCategory->id == $sc->id) ? 'font-weight: 600;' : ''}}"
                                                   id="edit_profile_user">{{$sc->name}}</a>
                                                <span class="sherif_sidebar_catalog-content_panel_amount">
                                                    ({{$sc->product_count}})
                                                </span>
                                                 </div></li>
                                                @php
                                                    if(isset($path[1])){
                                                        $p1 = $path[1];
                                                    }else{
                                                        $p1 = 0;
                                                    }
                                                @endphp
                                                @if ($p1==$sc->id)
                                                    @php
                                                        $childcat = \App\Category::where('parent_id',$sc->id)->get();

                                                    @endphp
                                                    @if($childcat)
                                                        <ul>
                                                        @foreach($childcat as $ssc)
                                                                <li><a href="{{route('slug',[$gc->slug . '/' . $ssc->slug])}}">{{$ssc->name}}</a></li>
                                                        @endforeach
                                                        </ul>
                                                    @endif
                                                @endif
                                            {{--@endif--}}
                                        @endforeach

                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>     
</div>
