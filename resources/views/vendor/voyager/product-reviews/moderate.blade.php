@extends('voyager::master')

@section('css')
    <style>

        #review_moderate .review-data {
            padding-top: 7px;
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
                <form class="form-horizontal col-md-offset-2 col-md-4" id="review_moderate" data-review-id="{{$model['id']}}">
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">К товару:</label>
                        <div class="col-sm-8 review-data"><a href="{{$model['product']['URL']}}">{{$model['product']['name']}}</a></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">Имя:</label>
                        <div class="col-sm-8 review-data">{{$model['name']}}</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">E-Mail:</label>
                        <div class="col-sm-8 review-data">{{$model['email'] ?? 'Не указан'}}</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right">Комментарий:</label>
                        <div class="col-sm-8 review-data">{{$model['review']}}</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right" for="status">Статус:</label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control">
                                @foreach($statuses as $val => $text)
                                    <option value="{{$val}}" @if($model['status'] == $val) selected @endif>{{$text}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4 text-right" for="response">Ответ:</label>
                        <div class="col-sm-8">
                            <textarea name="response" class="form-control" id="response" rows="10">{{$model['response']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group hidden" id="response_published">
                        <label class="control-label col-sm-offset-4 col-sm-8 text-left" for="response_sent">
                            <input type="checkbox" name="sent"> - Опубликовать на сайте<br /><small>(Если указан E-Mail, будет отправлено автору)</small>
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection