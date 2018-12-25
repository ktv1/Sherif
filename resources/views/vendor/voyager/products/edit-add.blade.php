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

    <link rel=stylesheet"" type="text/css"  href="{{asset('assets/libs/bootstrap-file-input/css/fileinput.min.css')}}">
@stop
@section('top-js')
    <script src="{{asset('assets/libs/bootstrap-file-input/js/fileinput.js')}}"></script>
@stop
@section('top-css')
    <link rel=stylesheet" type="text/css"  href="{{asset('assets/libs/bootstrap-file-input/css/fileinput.min.css')}}">
@stop
@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
<form role="form"
        class="form-edit-add"
        action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
        method="POST" enctype="multipart/form-data">
<div style="display:flex; 
            flex-direction: row; 
            justify-content:space-between; 
            align-items: center;">
    <div>
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i>
            {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
        </h1>
        @include('voyager::multilingual.language-selector')
        @if($dataTypeContent->exists)
        <a href="{{ route('voyager.interests.create') }}" class="btn btn-success">
            <span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;
            Интересовались
        </a>
        
        @php $s = DB::table('product_statuses')->where('id', $dataTypeContent->status)->first()->name; @endphp
        @if($s != "Снят с производства" && $s != "Нет в наличии")
        <a href="#" class="btn btn-success">
            <span class="glyphicon glyphicon-envelope"></span>&nbsp;
            Сообщить о снижении цены
        </a>
        @endif
        @endif
    </div>
    <div>
        <button class="btn btn-success save" id="submit_read">Сохранить</button>
        <button class="btn btn-warning save" id="submit_exit">Сохранить и закрыть</button>
        <button class="btn btn-primary save" id="submit_add">Сохранить и добавить ещё</button>  
    </div>
</div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                
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
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab2">Информация о товаре</a></li>
                            <li><a data-toggle="tab" href="#tab3">Фото</a></li>
                            <li><a data-toggle="tab" href="#tab4">Характеристики</a></li>
                            <li><a data-toggle="tab" href="#tab5">Сопутствующий</a></li>
                            <li><a data-toggle="tab" href="#tab6">Похожие товары</a></li>
                            <li><a data-toggle="tab" href="#tab8">Мета-теги</a></li>
                            @if($dataTypeContent->exists)
                            <li><a data-toggle="tab" href="#tab7">История изменений</a></li>
                            @endif
                            <li><a data-toggle="tab" href="#tab9">Служебная информация</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h4>Основная информация</h4>
                                            <table class="table table-hover" id="table_inform">
                                                <tbody>
                                                @foreach($dataTypeRows as $row)

                                                    <tr name="{{$row->field}}">
                                                    @if($row->field == 'description' ||
                                                        $row->field == 'characteristics' ||
                                                        $row->field == 'USD' ||
                                                        $row->field == 'EUR' ||
                                                        $row->field == 'UAH' ||
                                                        $row->field == 'URL' ||
                                                        $row->field == 'code' ||
                                                        $row->field == 'price_final' ||
                                                        $row->field == 'product_hasone_currency_relationship' ||
                                                        $row->field == 'profitability'||
                                                        $row->field == 'sale_discount' ||
                                                        $row->field == 'sale_price' ||
                                                        $row->field == 'profitability' ||
                                                        $row->field == 'mainimage' ||
                                                        $row->field == 'addimage' ||
                                                        $row->field == 'similar' ||
                                                        $row->field == 'concomitant' ||
                                                        $row->field == 'addimage' ||
                                                        $row->field == 'product_belongstomany_attribute_relationship' ||
                                                        $row->field == 'provider' ||
                                                        $row->field == 'concomitant_subcategory' ||
                                                        $row->field == 'maincategory' ||
                                                        $row->field == 'meta_heading' ||
                                                        $row->field == 'meta_title' ||
                                                        $row->field == 'meta_description' ||
                                                        $row->field == 'meta_keywords' ||
                                                        $row->field == 'label_end_date' ||
                                                        $row->field == 'product_belongsto_season_relationship' ||
                                                        $row->field == 'box' ||
                                                        $row->field == 'storage' ||
                                                        $row->field == 'tel1' ||
                                                        $row->field == 'tel2' ||
                                                        $row->field == 'name_contact' ||
                                                        $row->field == 'mailbox' ||
                                                        $row->field == 'link_to_provider' ||
                                                        $row->field == 'link_to_ishop' ||
                                                        $row->field == 'note_product')
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
                                                            {{ $row->slugify }}
                                                            <td><label for="name">{{ $row->display_name }}</label></td>
                                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                            @if($row->type == 'relationship')
                                                                <td>@include('voyager::formfields.relationship')</td>
                                                            @else
                                                                <td>{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}</td>
                                                            @endif
                                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                                <td>{!! $after->handle($row, $dataType, $dataTypeContent) !!}</td>
                                                            @endforeach
                                                        @endif
                                                        
                                                    </tr>
                                                        @if($row->display_name == 'Метка' && $dataTypeContent->label != null)
                                                        <tr id="label_row">
                                                            <td>Дата окончания</td>
                                                            <td><input class="form-control" type="date" value="{{$dataTypeContent->label_end_date}}" name="label_end_date" required></td>
                                                        </tr>
                                                        @endif
                                                @endforeach
                                                @if($dataTypeContent->exists)
                                                <tr><td><label for="sel1">Главная подкатегория</label></td>
                                                <td><select class="form-control" name='maincategory'>
                                                    @foreach($categories_list as $item)
                                                    <option value="{{$item->id}}" {{ old('maincategory') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                    @endforeach
                                                </select></td></tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div><!-- panel-body -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h4>Цена</h4>
                                            <table class="table table-hover">
                                                <tbody>
                                                @foreach($dataTypeRows as $row)
                                                    <tr>
                                                    @if($row->field == 'EUR' ||
                                                        $row->field == 'USD' ||
                                                        $row->field == 'UAH' ||
                                                        $row->field == 'product_hasone_currency_relationship')
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
                                                                {{ $row->slugify }}
                                                                <td><label for="name">{{ $row->display_name }}</label></td>
                                                                
                                                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                                @if($row->type == 'relationship')
                                                                    <td>@include('voyager::formfields.relationship')</td>
                                                                @else
                                                                    <td>{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}</td>
                                                                @endif
                                                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                                    <td>{!! $after->handle($row, $dataType, $dataTypeContent) !!}</td>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h4>Розничная цена</h4>
                                            <table class="table table-hover">
                                                <tbody>
                                                @foreach($dataTypeRows as $row)
                                                    <tr>
                                                    @if($row->field == 'profitability' ||
                                                        $row->field == 'price_final' ||
                                                        $row->field == 'sale_discount' ||
                                                        $row->field == 'sale_price' )
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
                                                                {{ $row->slugify }}
                                                                <td><label for="name">{{ $row->display_name }}</label> </td>
                                                                
                                                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                                @if($row->type == 'relationship')
                                                                    <td>@include('voyager::formfields.relationship') </td>
                                                                @else
                                                                    <td>{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!} </td>
                                                                @endif
                                                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                                    <td>{!! $after->handle($row, $dataType, $dataTypeContent) !!} </td>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-body dynamic">
                                            <table class="table table-default" id="dynamic_table">

                                                <tr>
                                                    <td colspan="3"><h4>Оптовая цена</h4></td>
                                                    <td><button type="button" id="add" class="btn btn-success">Добавить</button></td>
                                                </tr>
                                                @if(isset($wholesales))
                                                    @foreach($wholesales as $wholesale)
                                                        <table class="table table-hover">
                                                            <tr>
                                                                <td>Скидка %</td>
                                                                <td colspan="2"><input type="text" name="sale[]" id="sale" class="form-control" value="{{$wholesale->discount}}" placeholder="% скидки" required></td>
                                                                <td><button type="button" id="remove" class="btn btn-danger">Удалить</button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Количество от</td>
                                                                <td><input type="text" name="quantity[]" id="quantity" class="form-control" value="{{$wholesale->quantity}}" placeholder="Количество от" required></td>
                                                                <td><input type="text" name="unit[]" id="unit" class="form-control" value="{{$wholesale->unit}}" readonly></td>
                                                                <td>(единицы)</td>
                                                            </tr>
                                                        </table>
                                                    @endforeach
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-bordered col-lg-12">
                                    <div class="panel-body">
                                        <div class="form-group @if($dataTypeRows[13]->type == 'hidden') hidden @endif col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $dataTypeRows[13]->slugify }}
                                            <label for="name">Описание</label>
                                            {!! app('voyager')->formField($dataTypeRows[13], $dataType, $dataTypeContent) !!}

                                            @foreach (app('voyager')->afterFormFields($dataTypeRows[13], $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($dataTypeRows[13], $dataType, $dataTypeContent) !!}
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab3" class="tab-pane fade">
                                <!-- ### IMAGE ### -->
                                <div class="panel panel-bordered panel-primary col-lg-12">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::post.image') }}</h3>
                                        <div class="panel-actions">
                                            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                        </div>
                                    </div>
                                    @php
                                        $imagesjson = json_decode($dataTypeContent->addimage);
                                        //dd($dataTypeContent->addimage);
                                        $images = array();
                                        if(isset($imagesjson)) {
                                            foreach ($imagesjson as $key => $image) {
                                                $images[] = [
                                                    'image' => $image,
                                                    'order' => $key,
                                                ];
                                            }
                                        }
                                    @endphp
                                    <table id="image" class="table table-striped table-bordered table-hover panel-body">
                                        <thead>
                                        <tr>
                                            <td class="text-left">Главное зображение</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="file-preview-thumbnails" data-field-name="addimage" style="float:left;padding-right:15px;">
                                                    @if(isset($dataTypeContent->mainimage))
                                                        <img src="@if( !filter_var($dataTypeContent->mainimage, FILTER_VALIDATE_URL)){{ Voyager::image( $dataTypeContent->mainimage ) }}@else '/storage/placeholder.png' @endif"
                                                             style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                                    @else
                                                        <img src="/storage/placeholder.png" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                                                    @endif
                                                </div>

                                                <input class="btn-image" id="mainimage" type="file" name="mainimage" accept="image/*">
                                                <script>
                                                    //$(document).ready(function() {
                                                        $("#mainimage").fileinput({
                                                            showUpload: false,
                                                            maxFileCount: 1,
                                                            showRemove: false,
                                                            previewFileType: 'image',
                                                            initialPreviewCount: 1,
                                                            autoReplace: true,
                                                            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                                                            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                                                            allowedFileTypes: ['image'],
                                                            previewTemplates: {
                                                                image: '<div class="img_settings_container" id="{previewId}" data-fileindex="{fileindex}">\n' +
                                                                '   <img src="{data}" style="max-width: 20%;" class="" title="{caption}" alt="{caption}">\n' +
                                                                '</div>\n',
                                                                generic: '<div class="img_settings_container" id="{previewId}" data-fileindex="{fileindex}">\n' +
                                                                '   {content}\n' +
                                                                '</div>\n'
                                                            }
                                                        });
                                                    //});
                                                </script>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>


                                    <table id="images" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td class="text-left">Изображение</td>
                                            <td class="text-right">Сортировка</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $image_row = 0; ?>
                                        <?php foreach ($images as $image) { ?>
                                        <tr id="image-row<?php echo $image_row; ?>">
                                            <td class="text-left">
                                                <div class="img_settings_container" data-field-name="addimage" style="float:left;padding-right:15px;">
                                                    <img src="{{ Voyager::image( $image['image'] ) }}" data-image="{{ $image['image'] }}" data-id="{{ $dataTypeContent->id }}" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;">
                                                </div>
                                                <input id="inputImg<?php echo $image_row; ?>" type="file" name="addimage[<?php echo $image_row; ?>]">
                                                <script>
                                                    //$(document).ready(function() {
                                                        $("#inputImg<?php echo $image_row; ?>").fileinput({
                                                            showUpload: false,
                                                            maxFileCount: 1,
                                                            showRemove: false,
                                                            previewFileType: 'image',
                                                            initialPreviewCount: 1,
                                                            autoReplace: true,
                                                            allowedFileTypes: ['image'],
                                                            previewTemplates: {
                                                                image: '<div class="img_settings_container" id="{previewId}" data-fileindex="{fileindex}">\n' +
                                                                '   <img src="{data}" style="max-width: 20%;" class="" title="{caption}" alt="{caption}">\n' +
                                                                '</div>\n',
                                                                generic: '<div class="img_settings_container" id="{previewId}" data-fileindex="{fileindex}">\n' +
                                                                '   {content}\n' +
                                                                '</div>\n'
                                                            }
                                                        });
                                                   // });
                                                </script>

                                                <input type="hidden" name="addimage[<?php echo $image_row; ?>][image]" value="<?php echo $image['image']; ?>" id="input-image<?php echo $image_row; ?>" />
                                            </td>
                                            <td class="text-right" style="width: 10%;"><input type="text"
                                                                                              name="addimage[<?php echo $image_row; ?>][order]"
                                                                                              value="{{$image['order'] }}"
                                                                                              placeholder="сортировка"
                                                                                              class="form-control"/></td>
                                            <td class="text-left">
                                                <button type="button"
                                                        onclick="$('#image-row<?php echo $image_row; ?>, .tooltip').remove();"
                                                        data-toggle="tooltip" title="{{ trans('admin.button_remove')}}"
                                                        class="btn btn-danger"><i class="voyager-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php $image_row++; ?>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-left">
                                                <button type="button" onclick="addImage();" data-toggle="tooltip"
                                                        title="Добавить" class="btn btn-primary"><i class="voyager-plus"></i></button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <script type="text/javascript">
                                        // $(document).ready(function () {
                                        var image_row = <?php echo $image_row; ?>;

                                        function addImage() {
                                            console.log(image_row);
                                            html = '<tr id="image-row' + image_row + '">';
                                            html +=  '    <td class="text-left">  '  +
                                                '     <div class="img_settings_container" data-field-name="addimage" style="float:left;padding-right:15px;">  '  +
                                                '      <img src="/storage/placeholder.png" data-id="" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;"> ' +
                                                '    </div>' +
                                                '    <input id="inputImg' +image_row +'" type="file" name="addimage[' +image_row +']"> ' +
                                                '    <script>'  +
                                                '  $(document).ready(function() {' + '\n' +
                                                '    $("#inputImg' + image_row + '").fileinput({ ' + '\n' +
                                                '            showUpload: false, '  + '\n' +
                                                '            maxFileCount: 1, '  + '\n' +
                                                '            showRemove: false, '  + '\n' +
                                                '            previewFileType: "image", '  + '\n' +
                                                '            initialPreviewCount: 1, '  + '\n' +
                                                '            autoReplace: true, '  + '\n' +
                                                '            allowedFileTypes: ["image"], '  + '\n' +
                                                '            previewTemplates: { '  + '\n' +
                                                '                image: \'<div class="" id="{previewId}" data-fileindex="{fileindex}"><img src="{data}" style="max-width: 100%;" class="" title="{caption}" alt="{caption}"></div>\',' +
                                                '               generic: \'<div class="" id="{previewId}" data-fileindex="{fileindex}">{content}</div>\'' +
                                                '            } '  + '\n' +
                                                '        }); '  + '\n' +
                                                '   }); '  + '\n' +
                                                '    <\/script> '  +
                                                '  </td>  ' ;
                                            html += '  <td class="text-right"><input type="text" name="addimage[' + image_row + '][order]" value="0" placeholder="Сортировка" class="form-control" /></td>';
                                            html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="Удалить" class="btn btn-danger"><i class="voyager-trash"></i></button></td>';


                                            //  '       <input type="hidden" name="banner_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" />' ;
                                            html += '</tr>';

                                            $('#images tbody').append(html);
                                            image_row++;
                                        }
                                        // });
                                    </script>
                                </div>
                            </div>
                            <div id="tab4" class="tab-pane fade">
                                <div class="panel panel-bordered col-lg-12">
                                    <div class="panel-body panel-bordered col-lg-12">
                                                @foreach($dataTypeRows as $row)
                                                    <tr>
                                                    @if($row->field == 'product_belongsto_season_relationship')
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
                                                                {{ $row->slugify }}
                                                                <td><label for="name">{{ $row->display_name }}</label></td>
                                                                
                                                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                                @if($row->type == 'relationship')
                                                                    <td>@include('voyager::formfields.relationship')</td>
                                                                @else
                                                                    <td>{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}</td>
                                                                @endif
                                                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                                    <td>{!! $after->handle($row, $dataType, $dataTypeContent) !!}</td>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </br></br>
                                        <div id="table-attr" class="table-editable">
                                            <table id="attribute" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Название Характеристики</th>
                                                        <th>Опции</th>
                                                        <th>Управление</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='ctbody'>
                                                    @php $count = 0; @endphp
                                                    @if(isset($characteristics_list_objects ))
                                                        @foreach($characteristics_list_objects as $char)
                                                            @if($char != null)
                                                            <tr class="chosen_char" id_row="{{$count}}">
                                                                <td>
                                                                    <select class="form-control chosen_select" name="select_characteristic[]" id_row="{{$count}}">
                                                                        <option value="">None</option>
                                                                        <?php foreach($characteristics as $item): ?>
                                                                            <option value="{{$item->id}}"{{ $char->id == $item->id ? 'selected' : ''}}>{{$item->name}}
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                                <td  name="characteristic_options" id="option_{{$count}}">
                                                                        @php
                                                                            $char_options = DB::table('products_characteristics_pivot')->where([
                                                                                'product_id' => $dataTypeContent->id,
                                                                                'characteristic_id' => $char->id])
                                                                                ->pluck('option_id')
                                                                                ->toArray();//list of related options
                                                                            $all_char_options = DB::table('characteristic_options as co')
                                                                                ->where('id_characteristic', $char->id)
                                                                                ->get()
                                                                                ->toArray();//list of all options of current characteristic
                                                                        @endphp
                                                                        @if ($char->choose == 1)
                                                                            <select multiple class="form-control" name="characteristics_options[{{$char->id}}][]">

                                                                            @foreach($all_char_options as $char_opt)
                                                                                <option value="{{(int)$char_opt->id}}" {{ in_array((int)$char_opt->id, $char_options) ? 'selected' : ''}}>
                                                                                {{$char_opt->value}}
                                                                                </option>
                                                                            @endforeach
                                                                            </select>
                                                                        @else
                                                                            <input class="form-control" type="text" name="characteristics_options[{{$char->id}}][]" value="{{isset($char_options[0]) ? $char_options[0] : ''}}">
                                                                        @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger" id="dltRow"><span class="glyphicon glyphicon-remove"></span></button>
                                                                </td>
                                                            </tr>
                                                            @php $count++; @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                                    <tr>
                                                        <td colspan='3'>
                                                            <button type="button" class="btn btn-primary btn-sm" id='addRow'><span class="glyphicon glyphicon-plus"></span></button>
                                                        </td>
                                                    </tr>
                                                <input type="hidden" id="count_row" value="{{$count}}">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab5" class="tab-pane fade">
                                <div class="panel panel-bordered col-lg-12">

                                    @if (isset($dataTypeRows[26])) {{-- concomitant --}}
                                    @php

                                        $row = $dataTypeRows[26];

                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;

                                        $selected_values = isset($dataTypeContent) ? stripslashes($dataTypeContent->{$row->field}) : null;
                                        $selected_values = (json_decode($selected_values));
                                        if(!$selected_values) {
                                            $selected_values = array();
                                        }

                                        $relationshipOptions = app('App\Product')->whereIn('id',$selected_values)->get(['id','name','mainimage'])->toArray();
                                        $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                                    @endphp

                                    <div id="tableconcomitant" class="table-editable">

                                        <table class="table">
                                            <tr>
                                                <th>Сопутствующие товары</th>
                                            </tr>
                                            <tr>
                                                <td style="position: relative;">
                                                    <div>
                                                        <input type="text" name="product-concomitant" value="" placeholder="сопутствующие" id="input-related" class="form-control" />
                                                        <div id="product-concomitant" class="well well-sm" style="overflow: auto;">
                                                            @php $c = 0; @endphp
                                                            @if (isset($relationshipOptions))
                                                            @foreach ($relationshipOptions as $k =>$product_related)

                                                                    <div class="prodconcomitant" id="product-concomitant{{$product_related['id']}}"><span onclick="$('#product-concomitant{{$product_related['id']}}').remove();" class="table-remove glyphicon glyphicon-remove" style="float: left; margin-top: 8px"></span> <img src='/storage/{{get_download_image_cache($product_related['mainimage'],50,50)}}'> {{$product_related['name']}}
                                                                    <input type="hidden" name="{{ $row->field }}[{{$k}}][]" value="{{$product_related['id']}}" />
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

                                                $('input[name=\'product-concomitant\']').autocomplete({
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

                                                        $('input[name=\'product-concomitant\']').val('');

                                                        $('#product-concomitant' + item['value']).remove();

                                                        $('#product-concomitant').append('<div class="prodconcomitant" id="product-concomitant' + item['value'] + '"><span onclick="$(\'#product-concomitant' + item['value'] + '\').remove();" class="table-remove glyphicon glyphicon-remove" style="float: left; margin-top: 8px"></span> <img src=' + item['thumb'] + '>' + item['label'] + '<input type="hidden" name="concomitant[]" value="' + item['value'] + '" /></div>');
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                    @endif
                                </div>

                            </div>
                            <div id="tab6" class="tab-pane fade">
                                <div class="panel panel-bordered col-lg-12">

                                    @if (isset($dataTypeRows[28])) {{-- similar --}}
                                    @php
                                        $row = $dataTypeRows[28];

                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;

                                        $selected_values = isset($dataTypeContent) ? stripslashes($dataTypeContent->{$row->field}) : null;
                                        $selected_values = (json_decode($selected_values));
                                        if(!$selected_values) {
                                            $selected_values = array();
                                        }

                                        $relationshipOptions = app('App\Product')->whereIn('id',$selected_values)->get(['id','name','mainimage'])->toArray();
                                        $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                                        //$selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table)->withPivot('value')->get() : array();
                                    @endphp

                                    <div id="tablesimilar" class="table-editable">
                                        <table class="table">
                                            <tr>
                                                <th>Похожие товары</th>
                                            </tr>
                                            <tr>
                                                <td style="position: relative">
                                                    <div>
                                                        <input type="text" name="product-similar" value="" placeholder="похожие" id="input-similar" class="form-control" />
                                                        <div id="product-similar" class="well well-sm" style="overflow: auto;">
                                                            @php $c = 0; @endphp
                                                            @if (isset($relationshipOptions))
                                                                @foreach ($relationshipOptions as $k =>$product_related)

                                                                    <div class="prodconcomitant" id="product-concomitant{{$product_related['id']}}"><span onclick="$('#product-concomitant{{$product_related['id']}}').remove();" class="table-remove glyphicon glyphicon-remove" style="float: left; margin-top: 8px"></span> <img src='/storage/{{get_download_image_cache($product_related['mainimage'],50,50)}}'> {{$product_related['name']}}
                                                                        <input type="hidden" name="{{ $row->field }}[{{$k}}][]" value="{{$product_related['id']}}" />
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

                                                $('input[name=\'product-similar\']').autocomplete({
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
                                                        $('input[name=\'product-similar\']').val('');
                                                        $('#product-similar' + item['value']).remove();
                                                        $('#product-similar').append('<div class="prodconcomitant" id="product-similar' + item['value'] + '"><span onclick="$(\'#product-similar' + item['value'] + '\').remove();" class="table-remove glyphicon glyphicon-remove" style="float: left; margin-top: 8px"></span> <img src=' + item['thumb'] + '>' + item['label'] + '<input type="hidden" name="similar[]" value="' + item['value'] + '" /></div>');
                                                    }
                                                });
                                            });

                                        </script>
                                    </div>
                                    @endif
                                </div>
                        </div>
                            <div id="tab7" class="tab-pane fade">
                                @if($dataTypeContent->exists && isset($edit_info))
                                    <div class="col-lg-6">
                                    <div class="panel panel-bordered" style="padding-bottom:5px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td colspan="3">
                                                        <h4>История публикаций</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><b>Дата</b></th>
                                                    <th><b>Пользователь</b></th>
                                                    <th><b>Примечание</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$edit_info->publication_updated_at}}</td>
                                                    <td>{{$edit_info->publication_user}}</td>
                                                    <td>{{$edit_info->publication_action}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="panel panel-bordered" style="padding-bottom:5px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td colspan="2">
                                                        <h4>История правок</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><b>Дата</b></th>
                                                    <th><b>Пользователь</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$edit_info->editing_updated_at}}</td>
                                                    <td>{{$edit_info->editing_user}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="panel panel-bordered" style="padding-bottom:5px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td colspan="2">
                                                        <h4>История описания</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><b>Дата</b></th>
                                                    <th><b>Пользователь</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$edit_info->description_updated_at}}</td>
                                                    <td>{{$edit_info->description_user}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="panel panel-bordered" style="padding-bottom:5px;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td colspan="3">
                                                        <h4>История статуса</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><b>Пользователь</b></th>
                                                    <th><b>Установлен статус</b></th>
                                                    <th><b>Дата</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$edit_info->status_user}}</td>
                                                    <td>{{$edit_info->status}}</td>
                                                    <td>{{$edit_info->status_updated_at}}</td>
                                                </tr>
                                                @if(isset($edit_info->status_to_change))
                                                    <tr>
                                                        <td colspan='2'> Статус будет изменен на "В Наличии"</td>
                                                        <td>{{$edit_info->status_to_change}}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div id="tab8" class="tab-pane fade">
                            <div class="col-lg-12">
                                <div class="panel panel-bordered" style="padding-bottom:5px;">
                                    <div class="panel-body">
                                    @foreach($dataTypeRows as $row)
                                        @if($row->field == 'meta_title' ||
                                            $row->field == 'meta_heading' ||
                                            $row->field == 'meta_description' ||
                                            $row->field == 'meta_keywords')

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
                                        @endif
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="tab9" class="tab-pane fade">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <h4>Цена</h4>
                                            <table class="table table-hover">
                                                <tbody>
                                                @foreach($dataTypeRows as $row)
                                                    <tr>
                                                    @if($row->field == 'box' ||
                                                        $row->field == 'storage' ||
                                                        $row->field == 'tel1' ||
                                                        $row->field == 'tel2' ||
                                                        $row->field == 'name_contact' ||
                                                        $row->field == 'mailbox' ||
                                                        $row->field == 'link_to_provider' ||
                                                        $row->field == 'link_to_ishop' ||
                                                        $row->field == 'note_product')
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
                                                                {{ $row->slugify }}
                                                                <td><label for="name">{{ $row->display_name }}</label></td>

                                                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                                @if($row->type == 'relationship')
                                                                    <td>@include('voyager::formfields.relationship')</td>
                                                                @else
                                                                    <td>{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}</td>
                                                                @endif
                                                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                                    <td>{!! $after->handle($row, $dataType, $dataTypeContent) !!}</td>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>
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
        //adding characteristics row

        $('#addRow').click(function(){
            var count = $('#count_row').val();
            var html_string = '<tr class="chosen_char" id_row="'+count+'"><td><select class="form-control chosen_select" name="select_characteristic[]" id_row="'+count+'"><option value="">None</option><?php foreach($characteristics as $item): ?><option value="<?php echo $item->id ?>"><?php echo $item->name ?></option><?php endforeach; ?></select></td><td name="characteristic_options" id="option_'+count+'"></td><td><button type="button" class="btn btn-danger" id="dltRow"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
            $('#ctbody').append(html_string);
            $("#count_row").val(Number($("#count_row").val()) + 1);
        });
        
        $(document).on('click', '#dltRow', function(){
            $(this).parents('tr').remove();
        });

        
        $(document).on('change', ".chosen_select", function() {
            var id_row = $(this).attr('id_row');


            var maincategory = {{$dataTypeContent->maincategory}};
            if($(this).val() != '') {
                var data = $(this).val(); 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'{{ route("char_opt") }}',
                    method:"POST",
                    data: {data: data, maincategory:maincategory},
                    success: function (data) {
                        $('#option_' + id_row).empty().append(data);
                    }
                });
            } else {
                $('#option_' + id_row).empty();
            }
        }); 
                                        

        //add trade options
        var additional_field = '<table class="table table-hover"><tr><td>Скидка %</td><td colspan="2"><input type="text" name="sale[]" id="sale" class="form-control" placeholder="% скидки" required></td><td><button type="button" id="remove" class="btn btn-danger">Удалить</button></td></tr><tr><td>Количество от</td><td><input type="text" name="quantity[]" id="quantity" class="form-control" placeholder="Количество от" required></td><td><select name="unit[]" id="unit" class="form-control" required><option value="шт.">шт.</option><option value="уп.">уп.</option><option value="кг.">кг.</option><option value="ящ.">ящ.</option></select></td><td>(единицы)</td></tr></table>';

        $(document).ready(function () {
            $('#add').click(function(e) {
                $('.panel-body.dynamic').append(additional_field);
            });
            
            
            $('#add_attributes').click(function (e) {

            })
        });

        $(document).ready(function () {
            $('.panel-body.dynamic').on('click', '#remove', function(e) {
                $(this).parents().eq(3).remove();

            });
        });



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

        /* Submit buttons */
        jQuery(document).ready(function(){
            jQuery('#submit_exit').click(function(e){
               var input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "button_type").val("submit_exit");
                $('.form-edit-add').append(input);
            });
        });
        
        jQuery(document).ready(function(){
            jQuery('#submit_read').click(function(e){
               var input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "button_type").val("submit_read");
                $('.form-edit-add').append(input);
            });
        });

        jQuery(document).ready(function(){
            jQuery('#submit_add').click(function(e){
               var input = $("<input>")
                    .attr("type", "hidden")
                    .attr("name", "button_type").val("submit_add");
                $('.form-edit-add').append(input);
            });
        });
            
        //Label date choosing
        $("#table_inform").on('change', "select[name='label']", function() {
            if ($(this).val() != '') {
                if(($("#table_inform").find( "#label_row" ).length) < 1) {
                    $("tr[name='product_belongsto_product_label_relationship']").after('<tr id="label_row"><td>Дата окончания</td><td><input class="form-control" type="date" name="label_end_date" required></td></tr>');
                }
            }
            if ($(this).val() == '') {
                    $("#label_row").remove();
            }
        }); 

        //discount calculation
        $(document).ready(function() {
            
            $("#sale_discount").on("keydown keyup", function() {
                getSalePrice();
            });

            $("#sale_price").on("keydown keyup", function() {
                getPercent();
            });

            function getPercent() {
                var num1 = document.getElementById('price_final').value;
                var num3 = document.getElementById('sale_price').value;
                var result = (parseInt(num1) - parseInt(num3)) / parseInt(num1) * 100;
                if (!isNaN(result)) {
                    document.getElementById('sale_discount').value = Math.round(result);
                }
            }

            function getSalePrice() {
                var num1 = document.getElementById('price_final').value;
                var num2 = document.getElementById('sale_discount').value;
                var result = (parseInt(num1) / 100) * (100 - parseInt(num2));
                if (!isNaN(result)) {
                    document.getElementById('sale_price').value = Math.round(result);
                }
            }

        });

        

        /*
         $(document).ready(function() {
         var i = 1;
         $('#add').click(function () {
         i++;
         $('#dynamic_field').append('<tr id="row'+i+'"><td>Скидка %</td><td colspan="2"><input type="text" name="sale[]" id="sale"  class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">Удалить</button></td></tr><tr><td>Количество от</td><td><input type="text" name="quantity[]" id="quantity"  class="form-control name_list"></td><td><input type="text" name="unit[]" id="unit"  class="form-control name_list"></td><td>(единицы)</td></tr>');
         });

         });

         $(document).on('click', '.btn_remove', function() {
         var button_id = $(this).attr("id");
         $("#row"+button_id+"").remove();
         });*/




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

   <!--  <script src="{{asset('assets/libs/Autocmplete/jquery-ui.js')}}"></script> -->


    <!-- <script type="text/javascript">
        $('tfoot').on('click', ".select_characteristic", function(){
            $.ajax({
                url: '/admin/get/characteristic',
                type: 'get',
                contentType: false,//application/x-www-form-urlencoded',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function( data, textStatus, jQxhr ){
                    var array = [];
                    if(data != "None"){
                        data.forEach( function(element, index) {
                            array.push(element.name);
                        });
                    }
                    $(".select_characteristic").autocomplete({ //на какой input:text назначить результаты списка
                        source: array
                    });
                     // }else{
                     //     $(".find_input" + index).replaceWith("Команды не найдены")
                     //     setTimeout(function() { $(".find_input" + index).replaceWith("<i class='fas fa-times-circle not_found not_found" + index + "'></i>") }, 3000);
                     // } 
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });
        }); -->

    
    <!--</script>-->
@stop
