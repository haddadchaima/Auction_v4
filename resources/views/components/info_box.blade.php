<div class="info-box">
    <span class="info-box-icon bg-{{ isset($type) ? $type : 'info' }} elevation-1">
        @if(isset($icon))
            {{  $icon }}
        @else
            <i class="fa fa-address-book"></i>
        @endisset
    </span>

    <div class="info-box-content">
        {{ $slot }}
    </div>
</div>