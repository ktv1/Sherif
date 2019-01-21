@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
        /***************/
                .ui-autocomplete {list-style: none;padding: 0;margin: 0;display: block;outline: none;position: relative;top: 0;left: 0;cursor: default;z-index: 9999999;overflow-y: auto;overflow-x: hidden;color: #000;max-height: 100px;border: 1px solid #aaaaaa;background: #ffffff;}
                .ui-autocomplete .ui-menu-item {  position: relative;  margin: 0;  padding: 3px 5px 3px 5px;  cursor: pointer;  min-height: 0;}
                .ui-helper-hidden-accessible { display: none;}
                .ui-autocomplete .ui-menu-item:hover {background: #eee;}
            /***************/

        .prodconcomitant {padding: 5px;border-radius: 5px; border: 1px solid #ddd; margin: 5px 0; background-color: rgba(189, 208, 250, 0.23);}
        .prodconcomitant img{with:50px;margin:0 8px}
    </style>
    <script src="{{asset('assets/libs/jquery/jquery-1.11.2.min.js')}}"></script>
@stop

@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(!is_null($dataTypeContent->getKey()))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)



                                @if($row->field == 'order_belongstomany_product_relationship')
                                        <?php continue ?>
                                   
                                @endif
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp
                                @if ($options && isset($options->legend) && isset($options->legend->text))
                                    <legend class="text-{{$options->legend->align or 'center'}}" style="background-color: {{$options->legend->bgcolor or '#f0f0f0'}};padding: 5px;">{{$options->legend->text}}</legend>
                                @endif
                                @if ($options && isset($options->formfields_custom))
                                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                                @else
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if($row->type == 'relationship')
                                            @include('voyager::formfields.relationship')
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                            @foreach($dataTypeRows as $row)
                            
                                @if ($row->field == 'order_belongstomany_product_relationship')
                                    <div class="col-lg-12">
                                    @php
                                        $options = json_decode($row->details);

                                        $display_options = isset($options->display) ? $options->display : NULL;
                                        $selected_values = ($row->type == 'relationship') ? $dataTypeContent->belongsToMany($options->model, $options->pivot_table)->withPivot('quantity')->get()->toArray() : array();
                                        //dd($selected_values);
                                       // $relationshipOptions = $dataTypeContent->whereIn('id',$selected_values)->get(['id','name','mainimage'])->toArray();
                                        //$relationshipData = (isset($data)) ? $data : $dataTypeContent;
                                        //$selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table)->withPivot('value')->get() : array();
                                    @endphp

                                    <div id="tablesimilar" class="table-editable panel panel-bordered ">
                                        <table class="table">
                                            <tr>
                                                <th>Товары</th>
                                            </tr>
                                            <tr>
                                                <td style="position: relative">
                                                    <div>
                                                        <input type="text" name="{{$row->field}}" value="" placeholder="Товары" id="input-similar" class="form-control" />
                                                        <input type="hidden" name="counttov" value="{{count($selected_values)}}">
                                                        <div id="product-similar" class="well well-sm" style="overflow: auto;">
                                                            @php $c = 0; @endphp
                                                            @if (isset($selected_values))
                                                                @foreach ($selected_values as $k =>$product_related)

                                                                    <div class="prodconcomitant" id="product-concomitant{{$product_related['id']}}"><span onclick="$('#product-concomitant{{$product_related['id']}}').remove();" class="table-remove glyphicon glyphicon-remove" style="float: left; margin-top: 8px"></span> <img src='/storage/{{get_download_image_cache($product_related['mainimage'],50,50)}}'> {{$product_related['name']}}
                                                                        <input type="hidden" name="{{ $row->field }}[{{$k}}][product_id]" value="{{$product_related['id']}}" />
                                                                        <input class="pull-right" type="text" name="{{ $row->field }}[{{$k}}][quantity]" value="{{$product_related['pivot']['quantity']}}">
                                                                    </div>
                                                                    @php $c++; @endphp
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <script type="text/javascript">

                                            $(document).ready(function() {

                                                $('input[name=\'{{$row->field}}\']').autocomplete({
                                                    'source': function (request, response) {
                                                        $.ajax({
                                                            url: "{{ route('autocomplete.fetchadm') }}",
                                                            dataType: 'json',
                                                            method: "POST",
                                                            data: {query: request, _token: $('input[name="_token"]').val()},
                                                            success: function (json) {
                                                                response($.map(json, function (item) {
                                                                    return {
                                                                        label: item['name'],
                                                                        value: item['id'],
                                                                        thumb: item['th']
                                                                    }
                                                                }));
                                                            }
                                                        });
                                                    },
                                                    'select': function (item) {
                                                        var c = $('input[name="counttov"]').val();
                                                        $('input[name=\'{{$row->field}}\']').val('');
                                                        $('#product-similar' + item['value']).remove();
                                                        $('#product-similar').append('<div class="prodconcomitant" id="product-similar' + item['value'] + '"><span onclick="$(\'#product-similar' + item['value'] + '\').remove();" class="table-remove glyphicon glyphicon-remove" style="float: left; margin-top: 8px"></span> <img src=' + item['thumb'] + '>' + item['label'] + '<input type="hidden" name="{{$row->field}}['+c+'][product_id]" value="' + item['value'] + '" /><input class="pull-right" type="text" name="{{ $row->field }}['+c+'][quantity]" value="1"></div>');
                                                        c++;
                                                       $('input[name="counttov"]').val(c);
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                    </div>
                                @endif 
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

            // Autocomplete */
    (function($) {
        $.fn.autocomplete = function(option) {
            return this.each(function() {
                this.timer = null;
                this.items = new Array();

                $.extend(this, option);

                $(this).attr('autocomplete', 'off');

                // Focus
                $(this).on('focus', function() {
                    this.request();
                });

                // Blur
                $(this).on('blur', function() {
                    setTimeout(function(object) {
                        object.hide();
                    }, 200, this);
                });

                // Keydown
                $(this).on('keydown', function(event) {
                    switch(event.keyCode) {
                        case 27: // escape
                            this.hide();
                            break;
                        default:
                            this.request();
                            break;
                    }
                });

                // Click
                this.click = function(event) {
                    event.preventDefault();

                    value = $(event.target).parent().attr('data-value');

                    if (value && this.items[value]) {
                        this.select(this.items[value]);
                    }
                }

                // Show
                this.show = function() {
                    var pos = $(this).position();
                    $(this).siblings('ul.dropdown-menu').css({
                        top: pos.top + $(this).outerHeight(),
                        left: pos.left
                    });

                    $(this).siblings('ul.dropdown-menu').show();
                }

                // Hide
                this.hide = function() {
                    $(this).siblings('ul.dropdown-menu').hide();
                }

                // Request
                this.request = function() {
                    clearTimeout(this.timer);

                    this.timer = setTimeout(function(object) {
                        object.source($(object).val(), $.proxy(object.response, object));
                    }, 200, this);
                }

                // Response
                this.response = function(json) {
                    html = '';

                    if (json.length) {

                        for (i = 0; i < json.length; i++) {
                            this.items[json[i]['value']] = json[i];
                        }

                        for (i = 0; i < json.length; i++) {
                            if (!json[i]['category']) {
                                html += '<li data-value="' + json[i]['value'] + '"><a href="#"><img width="50" height="50" class="sherif-product_content_img" src="' + json[i]["thumb"] +'" alt="">' + json[i]['label'] + '</a></li>';
                            }
                        }

                        // Get all the ones with a categories
                        var category = new Array();

                        for (i = 0; i < json.length; i++) {
                            if (json[i]['category']) {
                                if (!category[json[i]['category']]) {
                                    category[json[i]['category']] = new Array();
                                    category[json[i]['category']]['name'] = json[i]['category'];
                                    category[json[i]['category']]['item'] = new Array();
                                }

                                category[json[i]['category']]['item'].push(json[i]);
                            }
                        }

                        for (i in category) {
                            html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

                            for (j = 0; j < category[i]['item'].length; j++) {
                                html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
                            }
                        }
                    }

                    if (html) {
                        this.show();
                    } else {
                        this.hide();
                    }

                    $(this).siblings('ul.dropdown-menu').html(html);
                }

                $(this).after('<ul class="dropdown-menu"></ul>');
                $(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

            });
        }
    })(window.jQuery);
    </script>
@stop
