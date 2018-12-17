@extends('voyager::master')

@section('content')
    <div class="container-fluid">
        <h1 class="page-title"><i class="voyager-skull"></i>Blacklist</h1>
    </div>
    <div class="page-content browse container-fluid">
        <form class="form-horizontal col-md-4" id="blacklist_add">
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="form-group">
                <label class="control-label col-sm-4 text-right" for="type">Тип записи:</label>
                <div class="col-sm-8">
                    <select name="type" id="type" class="form-control" required>
                        <option disabled selected value>-- Выберите тип записи --</option>
                        <option value="ip">IP Адресс</option>
                        <option value="phone">Телефон</option>
                        <option value="email">E-Mail</option>
                    </select>
                </div>
            </div>
            <div class="form-group blocked hidden">
                <label class="control-label col-sm-4 text-right" for="blocked">Доступ к сайту:</label>
                    <div class="col-sm-offset-1 col-sm-2">
                    <input type="checkbox" name="blocked" id="blocked" class="ios-toggle">
                    <label for="blocked" class="checkbox-label" data-off="Да" data-on="Нет"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 text-right" for="value">Значение:</label>
                <div class="col-sm-8">
                    <input type="text" name="value" class="form-control" id="value" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 text-right" for="comment">Комментарий:</label>
                <div class="col-sm-8">
                    <textarea name="comment" class="form-control" id="comment"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4 text-right" for="comment">Создал:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="value" value="{{auth()->user()->name}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="restoreModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Дублирование записи</h4>
                </div>
                <div class="modal-body">
                    <p>Запись с таким значением уже существует.</p>
                    <p>Вы можете выбрать слудющие действия: </p>
                </div>
                <div class="modal-footer text-center">
                    <a href="javascript:;" title="Restore" class="btn btn-sm btn-success restore" id="restoreItemId" data-id="">
                        <i class="voyager-move"></i> <span class="hidden-xs hidden-sm">Восстановить</span>
                    </a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Вернуться</button>
                </div>
            </div>

        </div>
    </div>
@endsection