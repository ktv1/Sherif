@php $action = new $action($dataType, $data); @endphp

@if($dataType->slug == 'categories') 
    @if ($action->shouldActionDisplayOnDataType())
        @can($action->getPolicy(), $data)
            <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm"></span>
            </a>
        @endcan
    @endif
@elseif($dataType->slug == 'articles-categories') 
    @if ($action->shouldActionDisplayOnDataType())
        @can($action->getPolicy(), $data)
            <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm"></span>
            </a>
        @endcan
    @endif
@else


    @if ($action->shouldActionDisplayOnDataType())
        @can($action->getPolicy(), $data)
            <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm">{{ $action->getTitle() }}</span>
            </a>

        @endcan
    @endif
@endif