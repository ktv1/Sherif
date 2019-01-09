@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        form{
            display: flex;
            align-items: flex-start;
        }
        .form_input{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 100%;
        }
            .form_input label{
                margin: 0 10px 0px 0px;
            }

            .form_input input{
                border-radius: 4px;
                padding: 5px 8px;
                border: 1.5px solid #dfdfdf;
                width: 100%;
            }


            .form_inline{
                margin-left: 10%;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
                .form_inline h5{
                    font-weight: 300;
                    width: 200%;
                    margin: 0;
                }
                .form_inline input{
                    width: 50%;
                }

            .form_select{
                display: flex;
                justify-content: flex-start;
                margin-left: 10%;
            }
                .form_select select{
                    width: 77%;
                    margin-top: 15px;
                    margin-left: 10px;
                    padding: 5px;
                    border-radius: 4px;
                    border: 1.5px solid #dfdfdf;
                }

            .options_list{
                margin-top:10px;
                flex-direction: column;
            }

            .button_field{
                display: flex;
                justify-content: flex-end;
                align-items: center;
                margin-top: 30px;
                margin-right: -15px;
            }

            .Add_char{
                text-align: center;
                margin: 10px 0 35px;
            }

    </style>
@stop

@section('page_title', __('voyager::generic.viewing').' '.$dataType->display_name_plural)

@section('page_header')
    <div class="container-fluid" id="start_char">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        </h1>
        @include('voyager::multilingual.language-selector')
        <a href="#pannel_add" class="btn btn-success add_field">Добавить</a>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @if ($isServerSide)
                            <form method="get" class="form-search">
                                <div id="search-input">
                                    <select id="search_key" name="key">
                                        @foreach($searchable as $key)
                                                <option value="{{ $key }}" @if($search->key == $key){{ 'selected' }}@endif>{{ ucwords(str_replace('_', ' ', $key)) }}</option>
                                        @endforeach
                                    </select>
                                    <select id="filter" name="filter">
                                        <option value="contains" @if($search->filter == "contains"){{ 'selected' }}@endif>contains</option>
                                        <option value="equals" @if($search->filter == "equals"){{ 'selected' }}@endif>=</option>
                                    </select>
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control" placeholder="{{ __('voyager::generic.search') }}" name="s" value="{{ $search->value }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="submit">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        @endif
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <th>
                                                <input type="checkbox" class="select_all">
                                            </th>
                                        @endcan
                                        <?php $count = 1; ?>
                                            @foreach($dataType->browseRows as $row)
                                            <th>
                                                @if ($isServerSide)
                                                    <a href="{{ $row->sortByUrl() }}">
                                                @endif
                                                @if($count == 4)
                                                    Опции
                                                @else
                                                    {{ $row->display_name }}
                                                @endif
                                                @if ($isServerSide)
                                                    @if ($row->isCurrentSortField())
                                                        @if (!isset($_GET['sort_order']) || $_GET['sort_order'] == 'asc')
                                                            <i class="voyager-angle-up pull-right"></i>
                                                        @else
                                                            <i class="voyager-angle-down pull-right"></i>
                                                        @endif
                                                    @endif
                                                    </a>
                                                @endif
                                            </th>
                                            <?php $count++; ?>
                                            @endforeach
                                        <th>Управление</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTypeContent as $data)
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox_{{ $data->getKey() }}" value="{{ $data->getKey() }}">
                                            </td>
                                        @endcan
                                        <?php $count = 1; ?>
                                        @foreach($dataType->browseRows as $row)
                                            <td>
                                                @if($count == 1)
                                                    <span>{{ $data->{$row->field} }}</span>
                                                @else
                                                    @if($count == 2)
                                                        @if(stristr($data->{$row->field}, '-'))
                                                            <select multiple size="3" style="width:100%">
                                                                 @foreach($sort_category as $value)
                                                                    @if($value->parent_id == 0 || $value->parent_id == null)
                                                                        <option disabled>{{ $value->name }}</option>
                                                                    @else
                                                                        <option disabled>--{{ $value->name }}</option>
                                                                    @endif
                                                                 @endforeach
                                                            </select> 
                                                        @else
                                                            <?php 
                                                                $array = explode(',', $data->{$row->field});
                                                            ?>
                                                            <select multiple size="3" style="width:100%">
                                                                @foreach($array as $value)
                                                                    <?php 
                                                                        if(stristr($value, '[')){
                                                                            $value = explode('[', $value);
                                                                            $value = explode(']', $value[1]);
                                                                            $value = $value[0];
                                                                            $value = $categories->where('id', $value)->first();
                                                                            $value = isset($value->name) ? $value->name : '';
                                                                        }else{
                                                                            $value = $categories->where('id', $value)->first();
                                                                            if($value){
                                                                                $value = $value->name;
                                                                            }
                                                                            ///$value = "--" .  isset($value->name) ? $value->name : '';
                                                                        }
                                                                    ?>
                                                                    <option disabled>{{ $value }}</option>  
                                                                @endforeach
                                                            </select>
                                                        @endif

                                                        
                                                    @else
                                                        @if($count == 3)
                                                            @if($data->{$row->field} == 0)
                                                                Все категории
                                                            @else
                                                                Выборочно         
                                                            @endif
                                                        @else
                                                            @if($count == 4)
                                                                <?php 
                                                                    $char_opt = $options->where('id_characteristic', $data->getKey());
                                                                    $count_opt = count($char_opt);
                                                                ?>
                                                                @if($count_opt != 0 )
                                                                    @foreach($char_opt as $val)
                                                                        @if($count_opt != 1)
                                                                            {{$val->value}},
                                                                        @else
                                                                            {{$val->value}}
                                                                        @endif
                                                                        <?php  $count_opt-- ?>
                                                                    @endforeach
                                                                @else
                                                                   Отсутствует      
                                                                @endif
                                                            @endif       
                                                        @endif  
                                                    @endif
                                                @endif
                                               
                                            </td>
                                            <?php $count +=1; ?>
                                        @endforeach
                                        <td class="no-sort no-click" id="bread-actions" style="display: flex; flex-direction: row-reverse;">
                                            <a href="#pannel_add" class="btn btn-sm btn-warning edit_field" value="{{ $data->getKey() }}" >Изменить</a>
                                            <a class="btn btn-sm btn-danger delete_field" value="{{ $data->getKey() }}">Удалить</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($isServerSide)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="pannel_add">
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    
    


    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => [],
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        /*variables*/
        var element,
            array_options = [];

        /*Characteristics scripts*/

        $(".container-fluid").on('click', '.add_field', function(){
            array_options = [];
            var field = '<div class="col-md-12"> <div class="panel panel-bordered"> <div class="panel-body"> <h2 class="Add_char">Добавить Новую Характеристику</h2> <form> <div class="col-md-5"> <div class="form_input"> <label for="name">Название</label> <input type="name" id="name" required="" placeholder="Название Характеристики"> </div> <h4>Опции</h4> <div class="form_input options_list"> <div class="form_input fi-1"><input type="text" id="option_1" required="" placeholder="Опция"><button class="btn btn-xs btn-success add_option add-1" value="1">OKEY</button></div> </div> </div> <div class="col-md-7"> <div class="form_input form_inline chooser_categories"> <h5>Показывать для категорий</h5> <label for="choose-all">Все</label> <input type="radio" name="flag" element="all" class="choose" id="choose-all" checked=""> <label for="choose-in">Выбранных</label> <input type="radio" name="flag" element="in" class="choose" id="choose-in" > <input type="hidden" class="hide_choose" name="choose" value="0"> </div> <div class="form_select form_input"> </div> <div class="button_field"> <button class="btn btn-success character_add" type="new">Добавить</button> <a href="#start_char" class="btn btn-danger cancel_field">Отменить</a> </div></div></form></div></div></div>';
            $("#pannel_add").empty().append(field);
        });

        $("tr").on('click', '.edit_field', function(){
            var id = $(this).attr('value');
                array_options = [];
            $.ajax({
                url: 'get/characteristic/' + id,
                type: 'GET',
                contentType: false,//application/x-www-form-urlencoded',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function( data, textStatus, jQxhr ){

                     var choose_category = data.characteristic.categories;
                     var field = '<div class="col-md-12"> <div class="panel panel-bordered"> <div class="panel-body"> <h2 class="Add_char">Изменить характеристику</h2> <form> <div class="col-md-5"> <div class="form_input"> <label for="name">Название</label> <input type="name" id="name" required="" placeholder="Название Характеристики" value="' + data.characteristic.name + '"> </div> <h4>Опции</h4> <div class="form_input options_list">';

                        var i = 0;
                        data.options.forEach( function(element, index) {
                            array_options[index] = element.value;
                            field += '<div class="form_input fi-' + index + '"><input type="text" id="option_' + index + '" required="" value="' + element.value + '" placeholder="Опция"><button class="btn btn-xs btn-warning edit_option edit-' + index + '" value="' + index + '">EDIT</button><button class="btn btn-xs btn-danger delete_option del-' + index + '" value="' + index + '">DEL</button></div>';
                            i = index;
                        });
                            i++;
                        field += '<div class="form_input fi-' + i + '"><input type="text" id="option_' + i + '" required="" placeholder="Опция"><button class="btn btn-xs btn-success add_option add-' + i + '" value="' + i + '">OKEY</button></div>'

                        field += '</div> </div> <div class="col-md-7"> <div class="form_input form_inline chooser_categories"> <h5>Показывать для категорий</h5>';

                        if(data.characteristic.choose == 0){
                           field += '<label for="choose-all">Все</label> <input type="radio" name="flag" element="all" class="choose" id="choose-all" checked=""> <label for="choose-in">Выбранных</label> <input type="radio" name="flag" element="in" class="choose" id="choose-in" > <input type="hidden" class="hide_choose" name="choose" value="0"></div><div class="form_select form_input"> </div> <div class="button_field"> <button class="btn btn-success character_add" value="' + data.characteristic.id + '" type="edit">Обновить</button> <a href="#start_char" class="btn btn-danger cancel_field">Отменить</a> </div></div></form></div></div></div>';
                           $("#pannel_add").empty().append(field);
                        }else{
                            field += '<label for="choose-all">Все</label> <input type="radio" name="flag" element="all" class="choose" id="choose-all"><label for="choose-in">Выбранных</label> <input type="radio" name="flag" element="in" class="choose" id="choose-in" checked=""> <input type="hidden" class="hide_choose" name="choose" value="1"></div><div class="form_select form_input"> </div> <div class="button_field"> <button class="btn btn-success character_add" value="' + data.characteristic.id + '" type="edit">Обновить</button> <a href="#start_char" class="btn btn-danger cancel_field">Отменить</a> </div></div></form></div></div></div>';
                            $("#pannel_add").empty().append(field);
                            $.ajax({
                                url: 'get/categories',
                                type: 'GET',
                                contentType: false,//application/x-www-form-urlencoded',
                                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                                success: function( data, textStatus, jQxhr ){
                                    var selectString = '<label for="categoty">Категории</label><select name="category" id="category" multiple size="8">';
                                    data.categories.forEach( function(element, index) {
                                        if(choose_category.indexOf("" + element.id) != -1){
                                            if(element.parent_id == null || element.parent_id == 0){
                                                selectString += '<option value="' + element.id + '" selected>' + element.name + '</option>';
                                            }else{
                                                selectString += '<option value="' + element.id + '" selected>--' + element.name + '</option>';
                                            }
                                        }else{
                                            if(element.parent_id == null || element.parent_id == 0){
                                                selectString += '<option value="' + element.id + '">' + element.name + '</option>';
                                            }else{
                                                selectString += '<option value="' + element.id + '">--' + element.name + '</option>';
                                            }
                                        }
                                        
                                    });
                                    selectString += '</select>';
                                    $(".form_select").empty().append(selectString);
                                    
                                },
                                error: function( jqXhr, textStatus, errorThrown ){
                                    console.log( errorThrown );
                                }
                            });
                        }     

                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });
        });

        $("tr").on('click', '.delete_field', function(){
            var id = $(this).attr('value');
            $.ajax({
                url: 'delete/characteristic/' + id,
                type: 'delete',
                contentType: false,//application/x-www-form-urlencoded',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function( data, textStatus, jQxhr ){
                    location.reload();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

        });

        /*Characteristics toggle field*/

        $(".row").on('click', '.cancel_field', function(){
            $("#pannel_add").empty();
        });

        $(".row").on('click', ".choose", function(){
            var toggle = $(this).attr('toggle');
                element = $(this).attr('element');
            switch (element) {
                case 'all':
                    $(".form_select").empty();
                    $(".hide_choose").val(0)
                    break;
                case 'in':
                    $(".hide_choose").val(1)
                    $.ajax({
                        url: 'get/categories',
                        type: 'GET',
                        contentType: false,//application/x-www-form-urlencoded',
                        headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                        success: function( data, textStatus, jQxhr ){
                            var selectString = '<label for="categoty">Категории</label><select name="category" id="category" multiple size="8">';
                            data.categories.forEach( function(element, index) {
                                if(element.parent_id == null || element.parent_id == 0){
                                    selectString += '<option value="' + element.id + '">' + element.name + '</option>';
                                }else{
                                    selectString += '<option value="' + element.id + '">--' + element.name + '</option>';
                                }
                            });
                            selectString += '</select>';
                            $(".form_select").empty().append(selectString);
                            
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );
                        }
                    });
                    break;
            }
        });

            /*Characteristics add*/

        $(".row").on('click', ".character_add", function(){

            if($("#name").val().length == 0 || $("button").hasClass('delete_option') == false){
                alert("Заполните все поля!");
                return false;
            }
            if(element == "in" && $("#category").val().length == 0){
                alert("Выберите категорю!");
            }
            var type = $(this).attr('type');
            if($(".hide_choose").val() == 0){
                var choose = "ALL";
            }else{
                var choose = $("#category").val();
            }


            switch (type) {
                case "new":
                    var formData = {
                        name: $("#name").val(),
                        choose: choose,
                        options: array_options
                    }
                    var url = 'add/characteristic',
                        type = 'post';
                    break;
                case "edit":
                    var formData = {
                        name: $("#name").val(),
                        choose: choose,
                        options: array_options
                    }
                    var url = 'edit/characteristic/' + $(this).val(),
                        type = 'put';
                    break;
            }
            $.ajax({
                url: url,
                type: type,
                data: formData,
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function( data, textStatus, jQxhr ){
                   $("#pannel_add").empty();
                   alert('Обновите страницу, чтобы увидеть изменения!')

                },
                error: function(data){
                    $('html').append( data.responseText );
                }
            });

            return false;
        });

        /*Characteristics option*/

        $(".row").on('click', ".add_option", function(){
            var id = $(this).val(),
                option_val = $('#option_' + id).val();
                if(option_val.length == 0){
                    alert("Пустое Поле");
                }else{
                    array_options[id] = option_val;
                    console.log(array_options);
                    $(".add-" + id).replaceWith('<button class="btn btn-xs btn-warning edit_option edit-' + id + '" value="' + id + '">EDIT</button><button class="btn btn-xs btn-danger delete_option del-' + id + '" value="' + id + '">DEL</button>');
                    id++;
                    $(".options_list").append('<div class="form_input fi-' + id + '"><input type="text" id="option_' + id + '" placeholder="Опция"><button class="btn btn-xs btn-success add_option add-' + id + '" value="' + id + '">OKEY</button></div>');
                }
            return false;
        });

        $(".row").on('click', ".delete_option", function(){
            var id = $(this).val();
            for(var i in array_options){
                if(i == id){
                    array_options[i] = null;
                    $('.fi-' + id).remove();
                    break;
                }
            }
            return false;  
        });

        $(".row").on('click', ".edit_option", function(){
            var id = $(this).val();
            for(var i in array_options){
                if(i == id){
                    if($('#option_' + id).val().length != 0){
                        array_options[i] = $('#option_' + id).val();
                         alert('Опция обновлена!');
                    }else{
                        alert('Заполните поле опции!');
                    }
                    break;
                }
            }
            return false;  
        });





    </script>
@stop
