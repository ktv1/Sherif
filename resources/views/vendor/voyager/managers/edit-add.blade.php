@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    @include('layouts.bread_head_buttons')
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

                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                        <h4>Основная информация</h4>
                                        @foreach($dataTypeRows as $row)
                                            @if($row->field == 'name' ||
                                                $row->field == 'login' ||
                                                $row->field == 'manager_belongstomany_category_relationship')
                                                
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
                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                        <h4>E-mails</h4>
                                        @foreach($dataTypeRows as $row)
                                            @if($row->field == 'email1' ||
                                                $row->field == 'email2')
                                                
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
                                <div class="col-lg-4">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                        <h4>Номера телефонов</h4>
                                        @foreach($dataTypeRows as $row)
                                            @if($row->field == 'phone1' ||
                                                $row->field == 'phone2' ||
                                                $row->field == 'phone3')
                                                
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
    </script>
@stop
