@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <table class="table table-hover" id="table_inform">
                            </tbody>
                            @foreach($dataTypeRows as $row)
                                @if($row->field == 't1' ||
                                    $row->field == 'client_text' ||
                                    $row->field == 'mes_email' ||
                                    $row->field == 'delivery_companies')
                                @php continue; @endphp
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
                                        <tr>
                                        {{ $row->slugify }}
                                        <td><label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if($row->type == 'relationship')
                                        <td>@include('voyager::formfields.relationship')</td>
                                        @else
                                        <td>{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}</td>
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        <td>{!! $after->handle($row, $dataType, $dataTypeContent) !!}</td>
                                        @endforeach
                                        </tr>
                                    </div>
                                @endif
                            @endforeach
                            </tbody>
                            </table>

                            <table class="table table-hover" id="table_inform">
                                <h5>Текст, выдаваемый клиенту на экране в разных ситуациях: </h5>
                                <thead>
                                    <tr>
                                        <th>Ситуация</th>
                                        <th>Текст</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="ctbody">
                                @if(isset($situations))
                                    @foreach($situations as $item)
                                        <tr>
                                            <td><input class="form-control" type="text" name="situation[]" value="{{$item->situation}}"></td>
                                            <td><input class="form-control" type="text" name="situation_text[]" value="{{$item->text}}"></td>
                                            <td><button type="button" class="btn btn-danger" id="dltRow"><span class="glyphicon glyphicon-remove"></span></button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                    
                                </tbody>
                                    <tr>
                                        <td colspan='3'>
                                            <button type="button" class="btn btn-primary btn-sm" id='addRow'><span class="glyphicon glyphicon-plus"></span></button>
                                        </td>
                                    </tr>
                            </table>
                            <table class="table table-hover" id="table_inform">
                                <h5>Добавить списки e-mail на которые рассылаются сообщения по разным событиям: </h5>
                                <thead>
                                    <tr>
                                        <th>Событие</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="ct2body">
                                @if(isset($events))
                                    @foreach($events as $item)
                                        <tr>
                                            <td><input class="form-control" type="text" name="event[]" value="{{$item->event}}"></td>
                                            <td><input class="form-control" type="text" name="email[]" value="{{$item->email}}"></td>
                                            <td><button type="button" class="btn btn-danger" id="dltRow2"><span class="glyphicon glyphicon-remove"></span></button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                    
                                </tbody>
                                    <tr>
                                        <td colspan='3'>
                                            <button type="button" class="btn btn-primary btn-sm" id='addRow2'><span class="glyphicon glyphicon-plus"></span></button>
                                        </td>
                                    </tr>
                            </table>
                            <table class="table table-hover" id="table_inform">
                                <h5>Список транспортных компаний, которые используются при отправке товаров: </h5>
                                <thead>
                                    <tr>
                                        <th>Компания</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="ct3body">
                                @if(isset($companies))
                                    @foreach($companies as $item)
                                        <tr>
                                            <td><input class="form-control" type="text" name="company[]" value="{{$item->name}}"></td>
                                            <td><button type="button" class="btn btn-danger" id="dltRow3"><span class="glyphicon glyphicon-remove"></span></button></td>
                                        </tr>
                                    @endforeach
                                @endif
                                    
                                </tbody>
                                    <tr>
                                        <td colspan='3'>
                                            <button type="button" class="btn btn-primary btn-sm" id='addRow3'><span class="glyphicon glyphicon-plus"></span></button>
                                        </td>
                                    </tr>
                            </table>

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

        $('#addRow').click(function(){
            var html_string = ' <tr><td><input class="form-control" type="text" name="situation[]"></td><td><input class="form-control" type="text" name="situation_text[]"></td><td><button type="button" class="btn btn-danger" id="dltRow"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
            $('.ctbody').append(html_string);
        });
        $(document).on('click', '#dltRow', function(){
            $(this).parents('tr').remove();
        });


        $('#addRow2').click(function(){
            var html_string = ' <tr><td><input class="form-control" type="text" name="event[]"></td><td><input class="form-control" type="text" name="email[]"></td><td><button type="button" class="btn btn-danger" id="dltRow2"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
            $('.ct2body').append(html_string);
        });
        $(document).on('click', '#dltRow2', function(){
            $(this).parents('tr').remove();
        });

        $('#addRow3').click(function(){
            var html_string = ' <tr><td><input class="form-control" type="text" name="company[]"></td><td><button type="button" class="btn btn-danger" id="dltRow3"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
            $('.ct3body').append(html_string);
        });
        $(document).on('click', '#dltRow3', function(){
            $(this).parents('tr').remove();
        });
    </script>
@stop
