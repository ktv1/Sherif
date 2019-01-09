<!-- Pick up goods -->

@php



@endphp
<div class="sherif_home_main-box-right_bar-pick_up">

    <div class="sherif_sidebar_catalog-filter">
        <div class="sherif_sidebar_catalog-title">
            <h2>Фильтр:</h2>
        </div>
        <div class="sherif_sidebar_catalog-content panel-group">
            <div id="accordion-catalog" >
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <p>Сезон</p>
                            <a href="#subscribe_itm11" data-parent="#accordion-catalog" data-toggle="collapse"class=""><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                        </h4>
                    </div>
                    <div id="subscribe_itm11" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div>
                                <input type="checkbox" checked  name=""> Все сезоны<span class="pull-right">476</span><br>
                                <input type="checkbox"  name=""> Демисезон<span class="pull-right">255</span><br>
                                <input type="checkbox" name=""> Лето<span class="pull-right">100</span><br>
                                <input type="checkbox"  name=""> Зима<span class="pull-right">120</span><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($filters))

                <form id="flt">
                    <input type="hidden" name="currentcategory" value="{{$CurrentCategory->slug}}">
                @foreach($filters as $key => $filter)
                    <div id="accordion-catalog" >
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title sherif-subscribe_row arr-down">
                                    <p>{{$filter['name']}}</p>
                                    <a href="#subscribe_itm{{$key}}" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                                </h4>
                            </div>
                            <div id="subscribe_itm12" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    @if(isset($filter['values']))

                                        @foreach($filter['values'] as $k => $value)
                                            <input id="c-{{$key}}-{{$k}}" type="checkbox" data-id="{{$key}}" data-filterid="{{$k}}" name="{{$filter['slug']}}" value="{{$value['name']}}"> {{$value['name']}}<span class="pull-right">{{$value['count']}}</span><br>
                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </form>
            @endif

            <script type="text/javascript">
                $(function() {

                    var filters = [];
                    var str = '';
                    $('#flt').find('input').change(function(){
                        var filterid = [];
                        //var unic = [];
                        var params = $('#flt').find('input[type=checkbox]').filter(':checked');//$(this).serializeArray();

                        params.each(function (i,item) {
                            var fid = $(this).data('filterid');
                            var id = $(this).data('id');
                            var name = $(this).prop('tagName') === 'OPTION' ? $(this).parent().attr('name') : $(this).attr('name');
                            filterid[i] = {'id':id,'fid':fid,'val':$(this).val(),'name':name};
                        });

                        var result = [];
                        filters = [];
                        var map = new Map();
                        for (const item of filterid) {

                            if(!map.has(item.id)){
                                map.set(item.id, true);    // set any value to Map
                                result.push({
                                    id: item.id,
                                    name: item.name,
                                });
                            }
                        }

                        for (const item of result){
                            st = '';
                            for (const i of filterid){
                               if(item.id === i.id) {
                                   st += ','+ i.fid;
                               }
                            }
                            filters.push({
                               slug: item.name,
                               name: item.id,
                               value: st.indexOf(',') == 0 ? st.substring(1) : st
                            });

                        }


                    });

                    $('#flt').find('select, input').change(function(){
                        var fid = $(this).data('filterid');
                        if (fid) {
                            var $input = $('input[data-filterid='+fid+']');
                            if ($(this)[0].checked) {
                                $input.attr('checked', 'checked');
                            } else {
                                $input.removeAttr('checked');
                            }
                        }
                        var url = '';
                        url = window.location.origin + window.location.pathname + '/ajaxfilter' ;
                        var currcat = $('input[name="currentcategory"]').val();


                        var fstr = '';
                        for (var i = 0; i < filters.length; i ++) {
                           fstr += ',' + filters[i].name;
                        }
                        fstr = fstr.indexOf(',') == 0 ? fstr.substring(1) : fstr;
                        var str = '/ajaxfilter?' + 'filters=' + fstr;

                        for (var i = 0; i < filters.length; i ++) {
                            str += (str !== '' ? '&' : '') +  filters[i].slug + '=[' + filters[i].value + ']';
                        }

                        var newUrl = window.location.origin + window.location.pathname.replace('/ajaxfilter','') + str;

                        $.ajax({
                            url:url,
                            dataType:'json',
                            type: 'get',
                            data: {filters:filters,curcat:currcat},
                            headers: {
                                'X-CSRF-Token': $('[name="csrf-token"]').attr('content')
                            },
                            success: function(res) {
                                if(res) {
                                    $('#content').html(res);
                                    window.history.pushState({ajaxfilter: true}, document.title, newUrl);
                                }
                            }
                        });
                    });
                });
            </script>
            <div id="accordion-catalog" >
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title sherif-subscribe_row arr-down">
                            <p>Цвет</p>
                            <a href="#subscribe_itm13" data-parent="#accordion-catalog" data-toggle="collapse" cla><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                        </h4>
                    </div>
                    <div id="subscribe_itm13" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div>
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/multicam.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Multicam
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #606757;">
                                    <input type="checkbox" name=""> Olive
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/woodland.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Woodland
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #d1b37f;">
                                    <input type="checkbox" name=""> TAN
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #000;">
                                    <input type="checkbox" name=""> Black
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/A-TACS.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> A-TACS
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/A-TACS-AU.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> A-TACS AU
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/A-TACS-FG.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> A-TACS FG
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/ACU.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> ACU
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/MTP.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> MTP
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/mossy-oak.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Mossy Oak
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #ae8c70;">
                                    <input type="checkbox" name=""> Coyote
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #fff;">
                                    <input type="checkbox" name=""> White
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/cadpat.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Cadpat
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/flexktarn.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Flacktarn
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/AT-Digital.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> AT-Digital
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/Digital.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Digital
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/Khaki.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Khaki
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/FG.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> FG
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/OliveDrab.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Olive Drab
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/AOR-1.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> AOR 1/2
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/desert-dpm2.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Desert
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #521f05;">
                                    <input type="checkbox" name=""> Brown
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/ССЕTarn1.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> CCE Tarn
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/DDPM2.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> DDPM
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/tree2.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Березка
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #4e86a7;">
                                    <input type="checkbox" name=""> Navy Blue
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/dpm_urban_b_.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Urban
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/Kruptek.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Kruptek
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/Varan.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Varan
                                </div><br />
                                <div class="colors"  style="
                                        background: url({{asset('/assets/img/pic/filter/MARPAT.png')}});background-repeat: no-repeat;background-size: cover;">
                                    <input type="checkbox" name=""> Marpat
                                </div><br />
                                <div class="colors"  style="
    							                                    		background-color: #b2b2b2;">
                                    <input type="checkbox" name=""> Другой
                                </div><br />

                                <a href="#" class="pull-left">Показать еще <span>160</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion-catalog" >
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title sherif-subscribe_row arr-down">
                            <p>Критерий 6</p>
                            <a href="#subscribe_itm14" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                        </h4>
                    </div>
                    <div id="subscribe_itm14" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div>
                                <input type="checkbox" checked="" name=""> Складные <span class="pull-right">15</span><br>
                                <input type="checkbox"  name=""> Нескладные <span class="pull-right">0</span><br>
                                <input type="checkbox" name=""> Мультитул <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Нож многофункциональный <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Мультитул карманный <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Метательные <span class="pull-right">0</span><br>
                                <input type="checkbox" name=""> Балисонг - нож бабочка <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Сабли и мечи <span class="pull-right">22</span><br>
                                <input type="checkbox"  name=""> Топоры <span class="pull-right">22</span><br>
                                <input type="checkbox"  name=""> Учебные <span class="pull-right">22</span><br>
                                <input type="checkbox" name=""> Кукри и мачете <span class="pull-right">22</span><br>
                                <input type="checkbox"  name=""> Охотничьи <span class="pull-right">22</span><br>
                                <a href="#" class="pull-left">Показать еще <span>(160)</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion-catalog" >
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title sherif-subscribe_row arr-down">
                            <p>Критерий-8</p>
                            <a href="#subscribe_itm15" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                        </h4>
                    </div>
                    <div id="subscribe_itm15" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div>
                                <input type="checkbox" checked="" name=""> Складные <span class="pull-right">15</span><br>
                                <input type="checkbox"  name=""> Нескладные <span class="pull-right">0</span><br>
                                <input type="checkbox" name=""> Мультитул <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Нож многофункциональный <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Мультитул карманный <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Метательные <span class="pull-right">0</span><br>
                                <input type="checkbox" name=""> Балисонг - нож бабочка <span class="pull-right">0</span><br>
                                <input type="checkbox"  name=""> Сабли и мечи <span class="pull-right">22</span><br>
                                <input type="checkbox"  name=""> Топоры <span class="pull-right">22</span><br>
                                <input type="checkbox"  name=""> Учебные <span class="pull-right">22</span><br>
                                <input type="checkbox" name=""> Кукри и мачете <span class="pull-right">22</span><br>
                                <input type="checkbox"  name=""> Охотничьи <span class="pull-right">22</span><br>
                                <a href="#" class="pull-left">Показать еще <span>160</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accordion-catalog" >
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title sherif-subscribe_row arr-down">
                            <p>Цена</p>
                            <a href="#subscribe_itm16" data-parent="#accordion-catalog" data-toggle="collapse"><span class="pull-right"><i class="fas fa-sort-down"></i></span></a>
                        </h4>
                    </div>
                    <div id="subscribe_itm16" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div>
                                <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                <div data-role="main" class="ui-content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a href="#" class="filter-btn">СБРОСИТЬ ВСЕ ФИЛЬТРЫ</a>
            </div>
        </div>
    </div>
</div>