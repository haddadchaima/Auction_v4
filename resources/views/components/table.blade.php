@php
    $attributes = '';

    $class = isset($class) ? 'table '.$class : 'table';

    if(isset($type) && !empty($type)){
       foreach (explode(' ', $type) as $type){
          $class .=  ' table-'.$type;
       }
    }

    $attributes .= 'class="'.$class.'"';

    if(isset($id)){
        $attributes.= ' id="'.$id.'"';
    }

    if(isset($style)){
        $attributes.= ' style="'.$style.'"';
    }

@endphp
<table {{ view_html($attributes) }}>
    @isset($thead)
        <thead>
        {{ $thead }}
        </thead>
    @endisset
    <tbody>
    {{ $slot }}
    </tbody>

    @isset($tfoot)
        <tfoot>
        {{ $tfoot }}
        </tfoot>
    @endisset
</table>
