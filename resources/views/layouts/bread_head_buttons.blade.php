<form role="form"
        class="form-edit-add"
        action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
        method="POST" enctype="multipart/form-data">
<div style="display:flex; 
            flex-direction: row; 
            justify-content:space-between; 
            align-items: center;">
    <div>
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
    </div>
    <div>
        <button class="btn btn-success save" id="submit_read">Сохранить</button>
        <button class="btn btn-warning save" id="submit_exit">Сохранить и закрыть</button>
        <button class="btn btn-primary save" id="submit_add">Сохранить и добавить ещё</button>  
    </div>
</div>