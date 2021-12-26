<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                @include('layouts.includes.breadcrumb')
            </div><!-- /.col -->
        </div>
        @foreach(get_system_notices() as $notice)
            <div class="row mb-2">
                <div class="col-sm-12">
                    @component('components.alert',['type'=> $notice->type,'close' => true])
                        <h4>{{ $notice->title }}</h4>
                        {{ $notice->description }}
                    @endcomponent
                </div>
            </div>
        @endforeach

    </div>
</div>
