@extends('frontend.layouts.master')

@section('content')


<h1>hello world </h1>

@stop


@section('script')


<script>

Echo.channel('auction-bid')
    .listen('BroadcastAuctionBid', (e) => {
         console.log(e);
        //  console.log('ii');
    })
</script>

@stop
