@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->display_name_singular)

@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->display_name_singular) }} &nbsp;

        @can('edit', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp;
            {{ __('voyager::generic.edit') }}
        </a>
        @endcan
        @can('delete', $dataTypeContent)
            <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
            </a>
        @endcan

        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>
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
</div>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab2">Информация о товаре</a></li>
                    <li><a data-toggle="tab" href="#tab3">Фото</a></li>
                    <li><a data-toggle="tab" href="#tab4">Характеристики</a></li>
                    <li><a data-toggle="tab" href="#tab5">Сопутствующий</a></li>
                    <li><a data-toggle="tab" href="#tab6">Похожие товары</a></li>
                    <li><a data-toggle="tab" href="#tab7">История изменений</a></li>
                </ul>

                    <div class="tab-content">
                        @foreach($dataType->readRows as $row)
                            @if($row->field == 'description')
                                @php $rowDetails = json_decode($row->details);
                                if($rowDetails === null){
                                        $rowDetails=new stdClass();
                                        $rowDetails->options=new stdClass();
                                }
                                @endphp
                            @endif
                        @endforeach
                    <div id="tab2" class="tab-pane fade in active">
                    <div class="col-lg-6">
                        <div class="panel panel-bordered" style="padding-bottom:5px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="2">
                                            <h4>Основная информация</h4>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>ID</b></td>
                                        <td>{{$dataTypeContent->id}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Название</b></td>
                                        <td>{{$dataTypeContent->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Slug</b></td>
                                        <td>{{$dataTypeContent->slug}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>URL</b></td>
                                        <td>{{$dataTypeContent->URL}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Артикул</b></td>
                                        <td>{{$dataTypeContent->vendor_code}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Код Товара</b></td>
                                        <td>{{$dataTypeContent->code}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Склад</b></td>
                                        <td>{{$dataTypeContent->storage}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Ящик</b></td>
                                        <td>{{$dataTypeContent->box}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[38]->display_name}}</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[38]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[38]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[21]->display_name}}</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[21]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[21]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[13]->display_name}}</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[13]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[13]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
                                    </tr>
                                    @if(isset($dataTypeContent->maincategory->name))<tr>
                                        
                                        <td><b>Главная подкатегория</b></td>
                                        <td>{{$dataTypeContent->maincategory->name}}</td>
                                        
                                    </tr>@endif
                                    <tr>
                                        <td><b>Сопутствующая подкатегория</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[41]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[41]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[11]->display_name}}</b></td>
                                        <td>{{$dataTypeContent->manufacturer}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[15]->display_name}}</b></td>
                                        <td>
                                            @if($dataType->readRows[15]->type == 'checkbox')
                                                @if(json_decode($dataType->readRows[15]->details) && property_exists(json_decode($dataType->readRows[15]->details), 'on') && property_exists(json_decode($dataType->readRows[15]->details), 'off'))
                                                    @if($dataTypeContent->{$dataType->readRows[15]->field})
                                                    <span class="label label-info">{{ json_decode($dataType->readRows[15]->details)->on }}</span>
                                                    @else
                                                    <span class="label label-primary">{{json_decode($dataType->readRows[15]->details)->off }}</span>
                                                    @endif
                                                @else
                                                {{ $dataTypeContent->{$dataType->readRows[15]->field} }}
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[23]->display_name}}</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[23]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[23]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[40]->display_name}}</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[40]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[40]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[39]->display_name}}</b></td>
                                        <td>
                                        @php $rowDetails = json_decode($dataType->readRows[39]->details);
                                            if($rowDetails === null){
                                                    $rowDetails=new stdClass();
                                                    $rowDetails->options=new stdClass();
                                            }
                                        @endphp
                                        @if($dataType->readRows[39]->type == 'relationship')
                                            @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                        @endif
                                        </td>
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
                                            <h4>Цена</h4>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>{{$dataType->readRows[6]->display_name}}</b></td>
                                        <td>{{$dataTypeContent->EUR}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[7]->display_name}}</b></td>
                                        <td>{{$dataTypeContent->USD}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>{{$dataType->readRows[8]->display_name}}</b></td>
                                        <td>{{$dataTypeContent->UAH}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Учтена валюта</b></td>
                                        <td>{{$currency_name}}</td>
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
                                            <h4>Розничная цена</h4>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Наценка (%)</b></td>
                                        <td>{{$dataTypeContent->profitability}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Розничная цена в UAH</b></td>
                                        <td>{{$dataTypeContent->price_final}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Скидка (%)</b></td>
                                        <td>{{$dataTypeContent->sale_discount}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Стоимость со скидкой</b></td>
                                        <td>{{$dataTypeContent->sale_price}}</td>
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
                                            <h4>Оптовая цена</h4>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wholesales as $key=>$wholesale)
                                    <tr>
                                        <td><b>{{++$key}}. Скидка (%)</b></td>
                                        <td colspan="2">{{$wholesale->discount}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Количество от</b></td>
                                        <td>{{$wholesale->quantity}}</td>
                                        <td>{{$wholesale->unit}}</td>
                                    </tr>
                                    <tr style>
                                        <td><b>Оптовая цена в UAH</b></td>
                                        <td colspan="2">{{$wholesale->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="panel panel-bordered" style="padding-bottom:5px;">
                                @foreach($dataType->readRows as $row)
                                    @if($row->field == 'description')
                                        @php $rowDetails = json_decode($row->details);
                                        if($rowDetails === null){
                                                $rowDetails=new stdClass();
                                                $rowDetails->options=new stdClass();
                                        }
                                        @endphp
                                        @if($row->type == 'rich_text_box')
                                            <div class="panel-heading" style="border-bottom:0;">
                                                <h3 class="panel-title">{{ $row->display_name }}</h3>
                                            </div>

                                            <div class="panel-body" style="padding-top:0;">
                                                @include('voyager::multilingual.input-hidden-bread-read')
                                                <p>{!! $dataTypeContent->{$row->field} !!}</p>
                                            </div><!-- panel-body -->
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane fade">
                        
                    </div>
                    <div id="tab4" class="tab-pane fade">
                        <div class="panel panel-bordered" style="padding-bottom:5px;">
                            @foreach($dataType->readRows as $row)
                                @if($row->field == 'characteristics')
                                    @php $rowDetails = json_decode($row->details);
                                    if($rowDetails === null){
                                            $rowDetails=new stdClass();
                                            $rowDetails->options=new stdClass();
                                    }
                                    @endphp
                                    @if($row->type == 'rich_text_box')
                                        <div class="panel-heading" style="border-bottom:0;">
                                            <h3 class="panel-title">{{ $row->display_name }}</h3>
                                        </div>

                                        <div class="panel-body" style="padding-top:0;">
                                            @include('voyager::multilingual.input-hidden-bread-read')
                                            <p>{!! $dataTypeContent->{$row->field} !!}</p>
                                        </div><!-- panel-body -->
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane fade">
                        <h3>Tab 5</h3>
                        <p>Здесь будут сопутствующие товары.</p>
                    </div>
                    <div id="tab6" class="tab-pane fade">
                        <h3>Tab 6</h3>
                        <p>Здесь будут похожие товары.</p>
                    </div>
                    <div id="tab7" class="tab-pane fade">
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
                    </div>
                </div>
            </div>
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
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->display_name_singular) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
    <script>
        $(document).ready(function () {
            $('.side-body').multilingual();
        });
    </script>
    <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');
            console.log(form.action);

            $('#delete_modal').modal('show');
        });

    </script>
@stop