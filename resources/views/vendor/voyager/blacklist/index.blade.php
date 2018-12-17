@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('content')
    <div class="container-fluid">
        <h1 class="page-title"><i class="voyager-skull"></i>Blacklist</h1>
        <a href="{{route('voyager.blacklist.add')}}" class="btn btn-success">
            <i class="voyager-plus"></i>
            <span>Добавить</span>
        </a>
    </div>
    <div class="page-content browse container-fluid">
        <div class="row">
            @if(!isset($blacklist))
                <h3 class="text-center">Данные отсутствуют</h3>
            @else
                <div class="container-fluid">
                    <span>
                        <label for=""><input type="checkbox" id="withTrashed" checked> Показать удаленные</label>
                    </span>

                    <div class="btn-group pull-right" id="type_filter">
                        <button type="button" class="btn btn-primary" data-type="">Все</button>
                        <button type="button" class="btn btn-primary" data-type="ip">IP</button>
                        <button type="button" class="btn btn-primary" data-type="phone">Телефон</button>
                        <button type="button" class="btn btn-primary" data-type="email">E-Mail</button>
                    </div>
                </div>
                <table id="blacklist" class="table table-striped table-sm table-bordered">
                    <thead>
                    <tr>
                        <th class="th-sm">Тип записи</th>
                        <th class="th-sm">Значение</th>
                        <th class="th-sm">Комментарий</th>
                        <th class="th-sm">Доступ на сайт</th>
                        <th class="th-sm">Автор</th>
                        <th class="th-sm">Создано</th>
                        <th class="th-sm">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($blacklist as $index => $item)
                    <tr class="{{$item['deleted_at'] ? 'danger trashed' : ''}}">
                        <td>{{$item['type']}}</td>
                        <td>{{$item['value']}}</td>
                        <td>{{$item['comment']}}</td>
                        <td class="text-{{$item['blocked'] ? 'danger' : 'success'}}">
                            @if($item['type'] == 'ip')
                                {{$item['blocked'] ? 'Нет' : 'Да'}}
                            @endif
                        </td>
                        <td>{{$item['user']['name']}}</td>
                        <td>{{$item['created_at']}}</td>
                        <td width="20%">
                            @if($item['deleted_at'] === null)
                                <a href="{{route('voyager.blacklist.edit', ["id"=>$item["id"]])}}"
                                   title="Edit"
                                   class="btn btn-sm btn-primary edit">

                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Редактировать</span>
                                </a>
                                <a href="javascript:;"
                                    title="Delete"
                                    class="btn btn-sm btn-danger delete"
                                    data-id="{{$item["id"]}}"
                                    id="restore-{{$item["id"]}}">

                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Удалить</span>
                                </a>
                            @else
                                <a href="javascript:;"
                                   title="Restore"
                                   class="btn btn-sm btn-warning restore"
                                   data-id="{{$item["id"]}}"
                                   id="delete-{{$item["id"]}}">

                                    <i class="voyager-move"></i> <span class="hidden-xs hidden-sm">Восстановить</span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection