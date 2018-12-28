@extends('voyager::master')

@section('css')
    <style>
        .text-inline {
            white-space: nowrap;
        }

        #reviews a {
            text-decoration: none;
            font-size: 13px;
        }

        #reviews td {
            vertical-align: middle;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="page-title"><i class="voyager-bubble-hear"></i>Отзывы</h1>
    </div>
    <div class="page-content browse container-fluid">
        <div class="row">
            @if(!isset($model))
                <h3 class="text-center">Отзывы отсутствуют</h3>
            @else
                <div class="container-fluid">
                    <div class="btn-group pull-right" id="type_filter">
                        <button type="button" class="btn btn-primary" data-type="">Все</button>
                        <button type="button" class="btn btn-primary" data-type="Новый">Новые</button>
                        <button type="button" class="btn btn-primary" data-type="Одобрен">Одобренные</button>
                        <button type="button" class="btn btn-primary" data-type="Заблокирован">Заблокированные</button>
                    </div>
                </div>
                <table id="reviews" class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th class="th-sm">Статус</th>
                        <th class="th-sm">Имя</th>
                        <th class="th-sm">E-Mail</th>
                        <th class="th-sm">Товар</th>
                        <th class="th-sm">Отзыв</th>
                        <th class="th-sm">Менеджер</th>
                        <th class="th-sm">Комментарий</th>
                        <th class="th-sm">Отвечен</th>
                        <th class="th-sm">Добавлен</th>
                        <th class="th-sm">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model as $index => $item)
                        <tr>
                            <td class="{{$item['status'] == 'blocked' ? 'text-danger' : ($item['status'] == 'new' ? 'text-success' : 'text-basic')}}">
                                {{$statuses[$item['status']]}}
                            </td>
                            <td>
                                @if(isset($item['uid']))
                                    <a href="{{route('voyager.users.show', ['id'=>$item['uid']])}}">{{$item['name']}}</a>
                                @else
                                    {{$item['name']}}
                                @endif
                            </td>
                            <td>
                                {{$item['email']}}
                            </td>
                            <td class="text-inline">
                                <a href="{{route('productNoURL',[$item['product']['id']])}}" target="_blank">{{$item['product']['name']}}</a>
                            </td>
                            <td>
                                {{str_limit($item['review'], $limit = 100, $end = '...')}}
                            </td>
                            <td>
                                @if(isset($item['manager']['id']))
                                    <a href="{{route('voyager.users.show', ['id'=>$item['manager']['id']])}}">{{$item['manager']['name']}}</a>
                                @else
                                    {{$item['manager']['name']}}
                                @endif
                            </td>
                            <td>
                                {{str_limit($item['response'], $limit = 100, $end = '...')}}
                            </td>
                            <td>
                                {{$item['sent'] ? 'Да' : 'Нет'}}
                            </td>
                            <td class="text-inline">
                                {{\Carbon\Carbon::parse($item['created_at'])->format('Y-m-d')}}
                            </td>
                            <td>
                                <a href="{{route('voyager.product-reviews.moderate', ["id"=>$item["id"]])}}"
                                   title="Edit"
                                   class="btn btn-sm btn-primary edit">

                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Модерировать</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection