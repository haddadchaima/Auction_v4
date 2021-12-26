<!-- Start: single comment -->
@foreach($comments as $comment)
    <div class="single-comment position-relative mb-3">
        <div class="media">

            <!-- Start: media image -->
            <img class="mr-3 img-fluid" src="{{get_avatar($comment->user->avatar)}}" alt="image">
            <!-- End: media image -->

            <!-- Start: media body -->
            <div class="media-body">

                <!-- Start: name and date -->
                <span class="mb-1 d-inline-block comment-title">{{$comment->user->username}}</span>
                <div class="mb-3">
                    <span class="sub-text mr-3">{{ !is_null($comment->created_at) ? $carbon->parse($comment->created_at)->diffForHumans() : ''}}</span>
                    @if($comment->user_id == auth()->user()->id)
                        <div class="address-dropdown">
                            <a class="flex-sm-fill text-sm-center nav-link p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="fa fa-th-list icon-round"></i>
                            </a>
                            <div class="address-dropdown-menu">
                                <div class="dropdown-menu  drop-menu dropdown-menu-right">
                                    <a class="dropdown-item confirmation" data-alert="{{__('Are you sure?')}}"
                                       data-form-id="urm-{{$comment->id}}" data-form-method='delete'
                                       href="{{route('comment.destroy', $comment->id)}}">
                                        <i class="fa fa-trash-o mr-2"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- End: name and date -->

                <!-- Start: comment -->
                <p class="color-999 text-justify">{{$comment->content}}</p>
                <!-- End: comment -->

            </div>
            <!-- Start: media body -->

        </div>
    </div>
@endforeach
<!-- End: single comment -->
