@php
    $attributes = '';

    $class = isset($class) ? 'card card-outline '.$class : 'card card-outline';
    $class = isset($type) ? $class. ' card-'. $type : $class;
    $attributes .= 'class="'.$class.'"';

    if(isset($id)){
        $attributes.= ' id="'.$id.'"';
    }

    if(isset($style)){
        $attributes.= ' style="'.$style.'"';
    }

@endphp

<div {{ view_html($attributes) }}>
    @isset($header)
        <div class="card-header">
            {{ $header }}
        </div>
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
