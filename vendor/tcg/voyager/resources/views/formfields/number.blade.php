<input type="number"
       class="form-control"
       name="{{ $row->field }}"
       type="number"
       @if($row->field == "price_final" || $row->field == "sale_discount" || $row->field == "sale_price") id="{{ $row->field }}" @endif
       
       @if($row->required == 1) required @endif
       step="any"
       placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
       value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif">
