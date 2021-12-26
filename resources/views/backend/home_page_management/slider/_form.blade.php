
<!-- Start: auction main content -->
<div class="form-group form-row mt-4">
    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('title') }}">{{('Slider Title :')}}</label>

    <div class="col-lg-10">

        <div class="form-row">
            <div class="col-12">
                <!-- Start: title -->
                {{Form::text(fake_field('title'), old('title', isset($slider) ? $slider->title : null), ['class' => 'form-control', 'id' => fake_field('title'), 'data-cval-name' => 'Slider title', 'data-cval-rules' => 'required|min:3' ] )}}
                <span class="text-muted mt-1 d-block">{{__('Example : Home Page main slider')}}</span>
                <span class="invalid-feedback cval-error" data-cval-error="{{ fake_field('title') }}">{{ $errors->first('title') }}</span>
                <!-- End: title -->
            </div>
        </div>

    </div>

</div>
<!-- End: auction main content -->

<!-- Start: product image -->
<div class="form-group form-row mt-4">
    <label class="col-lg-2 col-form-label text-right pr-3 color-999" for="{{ fake_field('content') }}">{{('Multiple Image :')}}</label>
    <div class="col-lg-10">
        <div id="preview-multi-img">
            <div class="row" id="TextBoxContainer">
                @if(is_current_route('slider.edit'))
                    @foreach($slider->images as $image)
                        <div class="col-lg-4">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail mb-3">
                                        <img class="img" src="{{slider_images($image)}}"  alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>
                                    <div>
                                <span class="btn btn-sm btn-outline-success btn-file mr-2 wi-100" >
                                    <span class="fileinput-new">Select</span>
                                    <span class="fileinput-exists">Change</span>
                                    {{ Form::file('images[]', [old('images', $image),'class'=>'multi-input', 'id' => fake_field('images'),])}}
                                </span>
                                        <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 my-2">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail mb-3">
                                    <img class="img" src="{{slider_images('preview.png')}}"  alt="">
                                </div>
                                <div class="fileinput-preview fileinput-exists mb-3 img-thumbnail"></div>
                                <div>
                                <span class="btn btn-sm btn-outline-success btn-file mr-2 wi-100" >
                                    <span class="fileinput-new">Select</span>
                                    <span class="fileinput-exists">Change</span>
                                    {{ Form::file('images[]', [old('images'),'class'=>'multi-input', 'id' => fake_field('images'),])}}
                                </span>
                                    <a href="#" class="btn btn-sm btn-outline-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <button id="btnAdd" type="button" class="btn border bg-custom-gray">{{__('Add Image')}}</button>
            <span class="text-muted mt-2 d-block">{{__('Dimension : width and height 1000px * 400px')}}</span>
        </div>
    </div>
</div>
<!-- End: product image -->

<div class="card-footer text-muted">
    <button value="Submit" type="submit" class="btn btn-info float-right my-2">{{ is_current_route('slider.create') ? 'Create Slider' : 'Update'}}</button>
</div>
