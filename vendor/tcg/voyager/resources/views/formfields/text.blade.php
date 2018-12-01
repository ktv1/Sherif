<input @if($row->required == 1) required @endif type="text" class="form-control" name="{{ $row->field }}"
        placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
       {!! isBreadSlugAutoGenerator($options) !!}
       value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@elseif(isset($options->default)){{ old($row->field, $options->default) }}@else{{ old($row->field) }}@endif"
       @if($dataType->slug == 'interests' && $row->field == "product_URL" || $row->field == "product_id" || $row->field == "code" || $row->field == "URL")
        readonly
        @elseif($dataType->slug == 'articles' && $row->field == "editor")
        readonly
       @endif
       
       @if($dataType->slug == 'products' && $row->field == "name")
        required
       @endif
       >
