@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- <script type="text/javascript" src="/assets/libs/jquery/jquery-1.11.2.min.js"></script> -->

    <!-- Load CSS -->
    <script>
        function loadCSS(hf) {
            var ms=document.createElement("link");ms.rel="stylesheet";
            ms.href=hf;document.getElementsByTagName("head")[0].appendChild(ms);
        }
        loadCSS("/assets/libs/bootstrap-file-input/css/fileinput.min.css");
    </script>

    <style>
        .file-preview-thumbnails img{
            height: 80px!important;
            width: auto !important;
        }
    </style>

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

                    <form action="@if(isset($dataTypeContent->id)){{ route('admin.banner.save',$dataTypeContent->getKey()) }}@else{{ route('admin.banner.store') }}@endif" method="post" enctype="multipart/form-data" id="form-banner" class="form-horizontal"
                          role="form"
                          class="form-edit-add">
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


                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="id" value="{{$banner['id'] or '' }}">
                            <div class="form-group required">
                                <label class="col-sm-2 control-label"
                                       for="input-name">{!! trans('admin.entry_name') !!}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{$banner['name']}}"
                                           placeholder="{{ trans('admin.entry_name') }}" id="input-name"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-height">Высота</label>
                                <div class="col-sm-10">
                                    <input type="text" name="height" value="{{$banner['height']}}"
                                           placeholder="Высота" id="input-height"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-width">Ширина</label>
                                <div class="col-sm-10">
                                    <input type="text" name="width" value="{{$banner['width']}}"
                                           placeholder="Ширина" id="input-width"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"
                                       for="input-status">{{ trans('admin.entry_status') }}</label>
                                <div class="col-sm-10">
                                    <select name="status" id="input-status" class="form-control">
                                        <?php if ($banner['status']) { ?>
                                        <option value="1" selected="selected">Включено</option>
                                        <option value="0">Выключено</option>
                                        <?php } else { ?>
                                        <option value="1">Включено</option>
                                        <option value="0" selected="selected">Выключено</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <table id="images" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">{{ trans('admin.entry_title') }}</td>
                                    <td class="text-left" style="min-width: 40%;">{{ trans('admin.entry_link') }}</td>
                                    <td class="text-left">{{ trans('admin.entry_image') }}</td>
                                    <td class="text-left">Тип</td>
                                    <td class="text-right">{{ trans('admin.entry_sort_order') }}</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $image_row = 0; ?>
                                <?php foreach ($banner['banner_images'] as $banner_image) { ?>
                                <tr id="image-row<?php echo $image_row; ?>">
                                    <td class="text-left">
                                        <input type="text" name="banner_image[<?php echo $image_row; ?>][banner_image_description]; ?>][title]" value="<?php echo isset($banner_image['banner_image_description']) ? $banner_image['banner_image_description'] : ''; ?>" placeholder="{{ trans('admin.entry_title') }}" class="form-control" />
                                    </td>
                                    <td class="text-left" style="width: 30%;">
                                        <div class="form-group">
                                            @foreach($banner['banner_position'] as $key => $pos)
                                                <div class="col-md-10">
                                                    <input type="text"
                                                           name="banner_image[<?php echo $image_row; ?>][banner_link_position][{{$key}}][link]"
                                                           value="<?php echo isset($banner_image['banner_link_position'][$key]) ? $banner_image['banner_link_position'][$key]['link'] : ''; ?>"
                                                           placeholder="{{ trans('admin.entry_link') }}"
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-2">
                                                    <span style="font-size: 10px;">{{$pos}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <a href="" id="thumb-image<?php echo $image_row; ?>" data-toggle="image"
                                           class="img-thumbnail">
                                            <img id="thumb<?php echo $image_row; ?>"
                                                 src="<?php echo $banner_image['thumb']; ?>" alt="" title=""
                                                 data-placeholder=""/>
                                        </a>
                                        <input id="inputImg<?php echo $image_row; ?>" type="file" name="banner_image[<?php echo $image_row; ?>][image]">
                                        <script>
                                            $(document).ready(function() {
                                                $("#inputImg<?php echo $image_row; ?>").fileinput({
                                                    showUpload: false,
                                                    maxFileCount: 1,
                                                    showRemove: false,
                                                    previewFileType: 'image',
                                                    initialPreviewCount: 1,
                                                    autoReplace: true,
                                                    allowedFileTypes: ['image'],
                                                    previewTemplates: {
                                                        image: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
                                                        '   <img src="{data}" style="max-width: 100%;" class="" title="{caption}" alt="{caption}">\n' +
                                                        '</div>\n',
                                                        generic: '<div class="" id="{previewId}" data-fileindex="{fileindex}">\n' +
                                                        '   {content}\n' +
                                                        '</div>\n'
                                                    }
                                                });
                                            });
                                        </script>

                                        <input type="hidden" name="banner_image[<?php echo $image_row; ?>][image]" value="<?php echo $banner_image['image']; ?>" id="input-image<?php echo $image_row; ?>" /></td>
                                    </td>
                                    <td class="text-left">
                                        <select name="banner_image[<?php echo $image_row; ?>][type]"
                                                class="form-control" id="input-type">
                                            <option value="">Выберите тип</option>
                                            @foreach($banner['banner_types'] as $type)
                                                @if ($banner_image['type'] == $type)
                                                    <option value="{{$type}}" selected="selected">{{$type}}</option>
                                                @else
                                                    <option value="{{$type}}">{{$type}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-right" style="width: 10%;"><input type="text"
                                                                                      name="banner_image[<?php echo $image_row; ?>][sort_order]"
                                                                                      value="<?php echo $banner_image['sort_order']; ?>"
                                                                                      placeholder="{{ trans('admin.entry_sort_order')}}"
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
                                    <td colspan="4"></td>
                                    <td class="text-left">
                                        <button type="button" onclick="addImage();" data-toggle="tooltip"
                                                title="{{ trans('admin.button_banner_add')}}" class="btn btn-primary"><i class="voyager-plus"></i></button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>


                            <div class="panel-footer">
                                <button type="submit"
                                        class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            </div>
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
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                    </h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'
                    </h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger"
                            id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->

@stop

@section('javascript')
    <script>
        var params = {};
        var $image;

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

            $('.side-body input[data-slug-origin]').each(function (i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug: '{{ $dataType->slug }}',
                    image: $image.data('image'),
                    id: $image.data('id'),
                    field: $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function () {
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if (response
                        && response.data
                        && response.data.status
                        && response.data.status == 200) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function () {
                            $(this).remove();
                        })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });


        ////////////////////////////// add row function

        var image_row = <?php echo $image_row; ?>;

        function addImage() {
            console.log(image_row);
            html = '<tr id="image-row' + image_row + '">';
            html += '<td class="text-left">'  +
                '   <input type="text" name="banner_image['+ image_row +'][banner_image_description]; ?>]" value="" placeholder="{{ trans('admin.entry_title') }}" class="form-control" />'+
                '</td>'  +
                '<td class="text-left" style="width: 30%;">'  +
                '    <div class="form-group">'  +
                '    @foreach($banner["banner_position"] as $key => $pos)'  +
                '       <div class="col-md-10">'  +
                '        <input type="text" name="banner_image[<?php echo $image_row; ?>][banner_link_position][{{$key}}][link]" value="" placeholder="{{ trans('admin.entry_link') }}" class="form-control" />'  +
                '    </div>'  +
                '    <div class="col-md-2">'  +
                '        <span>{{$pos}}</span>'  +
                '    </div>'  +
                '@endforeach'  +
                '</div>'  +
                '</td>';

            html +=  '    <td class="text-left">  '  +
                '     <a href="" id="thumb-image' + image_row + '" data-toggle="image" class="img-thumbnail"><img src="/storage/placeholder.png" id="thumb' + image_row + '" alt="" title="" data-placeholder="{!! trans('admin.image_placeholder') !!}" /></a><input type="hidden" name="banner_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" />  '  +
                '    <input id="inputImg' + image_row + '" type="file" name="banner_image[' + image_row + '][image]"> ' +
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
                '  </td>  ' +
                '   <td class="text-left">' +
                '        <select name="banner_image[' + image_row + '][type]" class="form-control" id="input-type">' +
                '            <option value="" selected="selected">Выберите тип</option>' +
                '                @foreach($banner['banner_types'] as $type)' +
                '                    <option value="{{$type}}">{{$type}}</option>' +
                '               @endforeach' +
                '            </select>' +
                '        </td>' ;
            html += '  <td class="text-right"><input type="text" name="banner_image[' + image_row + '][sort_order]" value="0" placeholder="{!! trans('admin.sort_order') !!}" class="form-control" /></td>';
            html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="{!! trans('admin.image_button_remove') !!}" class="btn btn-danger"><i class="voyager-trash"></i></button></td>';


            //  '       <input type="hidden" name="banner_image[' + image_row + '][image]" value="" id="input-image' + image_row + '" />' ;
            html += '</tr>';

            $('#images tbody').append(html);
            image_row++;
        }



    </script>
@stop
