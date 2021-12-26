@if(is_array($auction->images))
    @foreach($auction->images as $image)
        <div class="item">
            <img class="img-fluid" src="{{auction_image($image)}}" alt="Image">
        </div>
    @endforeach
@else
    <div class="item">
        <img class="img-fluid" src="{{auction_image('logo.png')}}" alt="Image">
    </div>
@endif
