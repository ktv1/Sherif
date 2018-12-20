@extends('voyager::master')

@section('content')
    <div class="container-fluid">
        <h1 class="page-title"><i class="voyager-skull"></i>Blacklist</h1>
    </div>
    <div class="page-content browse container-fluid">
        @if(empty($record))
            <h3 class="text-center">Такой записи не существует</h3>
            <div style="text-align: center;">
                <a href="{{route('voyager.blacklist.index')}}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    Назад к списку
                </a>
            </div>
        @else
            <form class="form-horizontal col-md-4" id="blacklist_update">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="phone">Телефон:</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$record['phone']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="ip">IP Адресс:</label>
                    <div class="col-sm-8">
                        <input type="text" name="ip" class="form-control" id="ip" value="{{$record['ip']}}">
                    </div>
                </div>
                <div class="form-group blocked hidden">
                    <label class="control-label col-sm-4 text-right" for="blocked">Доступ к сайту:</label>
                    <div class="col-sm-offset-1 col-sm-2">
                        <input type="checkbox" name="blocked" id="blocked" class="ios-toggle" {{$record['blocked'] ? 'checked' : ''}}>
                        <label for="blocked" class="checkbox-label" data-off="Да" data-on="Нет"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="email">E-Mail:</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" id="email" value="{{$record['email']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="fullname">Полное Имя:</label>
                    <div class="col-sm-8">
                        <input type="text" name="fullname" class="form-control" id="fullname" value="{{$record['fullname']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="city">Город:</label>
                    <div class="col-sm-8">
                        <input type="text" name="city" class="form-control" id="city" value="{{$record['city']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="buyed_at">Дата заказа:</label>
                    <div class="col-sm-8">
                        <input type="text" name="buyed_at" class="form-control" id="buyed_at" value="{{$record['buyed_at']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="order_num">Номер заказа:</label>
                    <div class="col-sm-8">
                        <input type="text" name="order_num" class="form-control" id="order_num" value="{{$record['order_num']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="comment">Комментарий:</label>
                    <div class="col-sm-8">
                        <textarea name="comment" class="form-control" id="comment">{{$record['comment']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4 text-right" for="author">Создал:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="author" value="{{$record['user']['name']}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <button class="btn btn-success">Сохранить</button>
                    </div>
                </div>
            </form>

            @include('voyager::blacklist.partials.modal')

        @endif
    </div>
@endsection