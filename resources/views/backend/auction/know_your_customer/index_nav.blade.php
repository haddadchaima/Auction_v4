

<nav class="mb-3">
    <div class="nav nav-tabs text-muted" id="nav-tab" role="tablist">

        <a class="nav-item text-muted nav-link {{is_current_route($routeName, 'active', ['type' => null])}}" href="{{route($routeName)}}" >{{__('All')}}</a>

        @php $type = verification_status() @endphp
        @php unset($type[VERIFICATION_STATUS_UNVERIFIED]) @endphp
        @foreach($type as $key=>$val)

        <a class="nav-item text-muted nav-link {{is_current_route($routeName, 'active', ['type' => (string)$key])}} " href="{{route($routeName, $key)}}">{{$val}}</a>
        @endforeach

    </div>
</nav>


