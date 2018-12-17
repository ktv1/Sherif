@extends('voyager::master')

@section('content')
    <div class="container-fluid">
        <h1 class="page-title"><i class="voyager-skull"></i>Blacklist</h1>
    </div>
    <div class="page-content browse container-fluid">
        @if(empty($item))
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
                <label class="control-label col-sm-4 text-right" for="type">Тип записи:</label>
                <div class="col-sm-8">
                    <input type="text" name="type" class="form-control" id="type" value="{{$item['type']}}" disabled>
                </div>
            </div>
            <div class="form-group blocked hidden">
                <label class="control-label col-sm-4 text-right" for="blocked">Доступ к сайту:</label>
                <div class="col-sm-offset-1 col-sm-2">
                    <input type="checkbox" name="blocked" id="blocked" class="ios-toggle" {{$item['blocked'] ? 'checked' : ''}}>
                    <label for="blocked" class="checkbox-label" data-off="Да" data-on="Нет"></label>
                </div>
            </div>
            <div class="form-group">

                <label class="control-label col-sm-4 text-right" for="value">Значение:</label>
                <div class="col-sm-8">
                    <input type="text" name="value" class="form-control" id="value" value="{{$item['value']}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 text-right" for="comment">Комментарий:</label>
                <div class="col-sm-8">
                    <textarea name="comment" class="form-control" id="comment">{{$item['comment']}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 text-right" for="comment">Создал:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="value" value="{{$item['user']['name']}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </div>
        </form>
        @endif
    </div>
@endsection