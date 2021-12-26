

<!-- Start: comment form -->
<div class="modal fade" id="commentModalForm" tabindex="-1" role="dialog" aria-labelledby="commentModalFormTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalFormTitle">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::textarea(fake_field('content'), old('content'), ['class' => 'form-control color-666', 'id' => fake_field('content'),'placeholder' => __('Comment'), 'rows' => 3]) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Start: comment form -->
