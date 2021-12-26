<!-- Start: comment form -->
<div class="comment-form">
    {{ Form::open(['route'=>['comment.store', $auctionId],'class'=>'form-horizontal cvalidate']) }}
    @method('post')
    @basekey
        <div class="form-row">
            <div class="col-12">
                {{ Form::textarea(fake_field('content'), old('content'), ['class' => 'form-control color-666', 'id' => fake_field('content'),'placeholder' => __('Comment'), 'rows' => 3]) }}
                <button value="Submit" type="submit" class="btn custom-btn float-right has-spinner mt-3">{{__('Submit')}}</button>
            </div>
        </div>
    {{ Form::close() }}
</div>
<!-- Start: comment form -->
