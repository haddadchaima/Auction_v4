
    <ul class="nav nav-tabs justify-content-end mt-3" id="profileTab" role="tablist">

        <li class="nav-item">
            <a class="nav-item text-muted nav-link {{is_current_route($routeName, 'active', ['status' => null])}}" href="{{route($routeName, $seller->id)}}" >{{__('All Auctions')}}</a>
        </li>

        @php $status = auction_status() @endphp
        @foreach($status as $key=>$val)
            <li class="nav-item">

                <a class="nav-item text-muted nav-link {{is_current_route($routeName, 'active', ['id' => $seller->id,'status' => (string)$key])}} " href="{{route($routeName, ['id' => $seller->id,'status'=>$key])}}">{{$val}}</a>
            </li>
        @endforeach

    </ul>
