@extends('layouts.master')
@section('title', $title)
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            @component('components.info_box',['type'=>'info'])
                @slot('icon')
                    <i class="fa fa-gear"></i>
                @endslot

                <span class="info-box-text">{{ __('CPU Traffic') }}</span>
                <span class="info-box-number">10 <small>%</small></span>

            @endcomponent
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            @component('components.info_box',['type'=>'danger'])
                @slot('icon')
                    <i class="fa fa-google-plus"></i>
                @endslot

                <span class="info-box-text">{{ __('Likes') }}</span>
                <span class="info-box-number">41,410</span>

            @endcomponent
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            @component('components.info_box',['type'=>'success'])
                @slot('icon')
                    <i class="fa fa-shopping-cart"></i>
                @endslot

                <span class="info-box-text">{{ __('Sales') }}</span>
                <span class="info-box-number">760</span>

            @endcomponent
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            @component('components.info_box',['type'=>'warning'])
                @slot('icon')
                    <i class="fa fa-users"></i>
                @endslot

                <span class="info-box-text">{{ __('New Members') }}</span>
                <span class="info-box-number">2,000</span>

            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @component('components.card')
                @slot('header')
                    <h5 class="card-title">{{ __('Monthly Recap Report') }}</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a href="#" class="dropdown-item">{{ __('Action') }}</a>
                                <a href="#" class="dropdown-item">{{ __('Another action') }}</a>
                                <a href="#" class="dropdown-item">{{ __('Something else here') }}</a>
                                <a class="dropdown-divider"></a>
                                <a href="#" class="dropdown-item">{{ __('Separated link') }}</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                @endslot
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                        </p>

                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart fixer-salesChart" height="192"
                                    width="658"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>{{ __('Goal Completion') }}</strong>
                        </p>

                        <div class="progress-group">
                            {{ __('Add Products to Cart') }}
                            <span class="float-right"><b>160</b>/200</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary width-80-percent"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->

                        <div class="progress-group">
                            Complete Purchase
                            <span class="float-right"><b>310</b>/400</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger width-75-percent"></div>
                            </div>
                        </div>

                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">{{ __('Visit Premium Page') }}</span>
                            <span class="float-right"><b>480</b>/800</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success width-60-percent"></div>
                            </div>
                        </div>

                        <!-- /.progress-group -->
                        <div class="progress-group">
                            {{ __('Send Inquiries') }}
                            <span class="float-right"><b>250</b>/500</span>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-warning width-50-percent"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                    </div>
                    <!-- /.col -->
                </div>
                @slot('footer')
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-success"><i
                                            class="fa fa-caret-up"></i> 17%</span>
                                <h5 class="description-header">$35,210.43</h5>
                                <span class="description-text">{{ __('TOTAL REVENUE') }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-warning"><i
                                            class="fa fa-caret-left"></i> 0%</span>
                                <h5 class="description-header">$10,390.90</h5>
                                <span class="description-text">{{ __('TOTAL COST') }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-success"><i
                                            class="fa fa-caret-up"></i> 20%</span>
                                <h5 class="description-header">$24,813.53</h5>
                                <span class="description-text">{{ __('TOTAL PROFIT') }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-3 col-6">
                            <div class="description-block">
                                <span class="description-percentage text-danger"><i
                                            class="fa fa-caret-down"></i> 18%</span>
                                <h5 class="description-header">1200</h5>
                                <span class="description-text">{{ __('GOAL COMPLETIONS') }}</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                @endslot
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('components.card')
                @slot('header')
                    <h3 class="card-title">{{ __('Latest Members') }}</h3>

                    <div class="card-tools">
                        <span class="badge badge-danger">8 New Members</span>
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>

                @endslot
                    <ul class="users-list clearfix">
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user1-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Alexander Pierce</a>
                            <span class="users-list-date">Today</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user8-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Norman</a>
                            <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user7-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Jane</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user6-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">John</a>
                            <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user2-160x160.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Alexander</a>
                            <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user5-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Sarah</a>
                            <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user4-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Nora</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                            <img src="{{ asset('vendor/adminlte/img/user3-128x128.jpg') }}" alt="User Image">
                            <a class="users-list-name" href="#">Nadia</a>
                            <span class="users-list-date">15 Jan</span>
                        </li>
                    </ul>
                @slot('footer')
                    <a href="javascript:">{{ __('View All Users') }}</a>
                @endslot
            @endcomponent

        </div>
    </div>
@endsection
@section('style')
@endsection
@section('script')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/js/dashboard2.js') }}"></script>
@endsection
