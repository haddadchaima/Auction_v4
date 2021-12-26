@basekey
<div class="form-group">
    <div class="row align-items-center">
        <label for="" class="col-md-3 control-label required">{{ __('Name') }}</label>
        <div class="col-md-9">
            {{ Form::text(fake_field('name'),old('name', isset($role) ? $role->name : null),['class'=> $errors->has('name') ? 'form-control is-invalid' : 'form-control' ,'data-cval-name' => 'The role name field','data-cval-rules' => 'required|escapeInput']) }}
            <span class="invalid-feedback cval-error"
                  data-cval-error="{{ fake_field('name') }}">{{ $errors->first('name') }}</span>
        </div>
    </div>
</div>
<?php
$ModuleClasses = [];
?>
@foreach($routes as $name => $routeGroups)
    <?php
    if (isset($role)) {
        if (in_array($name, $currentUserRole[ROUTE_MUST_ACCESSIBLE])) {
            $checkBox = 1;
            $class = 'role-management-inactive-text';
        } elseif (in_array($name, $currentUserRole[ROUTE_NOT_ACCESSIBLE])) {
            $checkBox = 2;
            $class = 'role-management-inactive-text';
        } else {
            $checkBox = 3;
            $class = '';
        }
    } else {
        $checkBox = 3;
        $class = '';
    }
    ?>
    @if(empty(settings('show_fixed_roles')) && $checkBox!=3)
        @continue
    @endif
    <div class="route-group {{$class}}">
        <div class="row">
            <div class="col-md-12 order-1">
                <div class="col-md-12">
                <?php $allSubModules = true; ?>
                @foreach($routeGroups as $groupName=>$permissionLists)
                    <div class="row route-subgroup">
                        <div class="col-lg-9 col-md-12 pl-5 pl-lg-0 order-1 mb-3 border-bottom border-gray-11 pb-2">
                            <div class="row">
                                <?php $allItems = true; ?>
                                @foreach($permissionLists as $permissionName => $routeList)
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="lf-checkbox">
                                            @if($checkBox==3)
                                                {{ Form::checkbox("roles[$name][$groupName][]",$permissionName, isset($role->permissions[$name][$groupName]) ? (in_array($permissionName, $role->permissions[$name][$groupName]) ? true :false) : false ,["class"=>"route-item flat-blue module_action_$name task_action_$groupName", "id"=>"list-$name-$groupName-$permissionName"]) }}
                                            @endif
                                            <label class="{{$checkBox==1 ? 'active' : ($checkBox==2 ?'inactive' : '')}}"
                                                   for="list-{{$name}}-{{$groupName}}-{{ $permissionName }}">{{ Str::title(str_replace('_',' ',$permissionName)) }}</label>
                                        </div>
                                    </div>
                                    <?php
                                    if (!isset($role->permissions[$name][$groupName]) || !in_array($permissionName, $role->permissions[$name][$groupName])) {
                                        $allSubModules = false;
                                        $allItems = false;
                                    }
                                    ?>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 pl-3 order-0 mb-2">
                            <div class="lf-checkbox">
                                @if($checkBox==3)
                                    {{ Form::checkbox("task",1,$allItems,["class"=>"sub-module flat-blue task module_action_$name module_action_{$name}_{$groupName}","id"=>"task-$name-$groupName", "data-id"=>"$groupName"]) }}
                                @endif
                                <label class="{{$checkBox==1 ? 'active' : ($checkBox==2 ?'inactive' : '')}}"
                                       for="task-{{$name}}-{{$groupName}}">{{ Str::title(str_replace('_',' ',$groupName)) }}</label>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

            <div class="col-12 order-0">
                <div class="lf-checkbox mb-3">
                    @if($checkBox==3)
                        {{ Form::checkbox("module",1,$allSubModules,["class"=>"flat-blue module module_$name","id"=>"role-$name", "data-id"=>"$name"]) }}
                    @endif
                    <label class="{{$checkBox==1 ? 'active' : ($checkBox==2 ?'inactive' : '')}}"
                           for="role-{{$name}}">{{ Str::title(str_replace('_',' ',$name)) }}</label>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="float-right m-t-15">
    {{ Form::submit($buttonText,['class'=>'btn btn-sm btn-info form-submission-button']) }}
</div>
