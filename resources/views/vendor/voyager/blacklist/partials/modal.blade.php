{{--Duplicate modals ( restore / redirect )--}}
<div class="modal fade" id="restoreModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Дублирование записи</h4>
            </div>
            <div class="modal-body">
                <p>Запись с таким значением уже существует.</p>
                <p>Вы можете восстановить запись </p>
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

<div class="modal fade" id="redirectModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Дублирование записи</h4>
            </div>
            <div class="modal-body">
                <p>Запись с таким значением уже существует.</p>
                <p>Вы можете перейти к записи </p>
            </div>
            <div class="modal-footer text-center">
                <a href="{{route('voyager.blacklist.edit', ['/'])}}" title="Redirect" class="btn btn-sm btn-success redirect" id="redirectItemId" data-id="">
                    <i class="voyager-move"></i> <span class="hidden-xs hidden-sm">Перейти</span>
                </a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Вернуться</button>
            </div>
        </div>
    </div>
</div>
{{--Duplicate modals ( restore / redirect )--}}