
<div>
{{--    <button class="cm-filter-toggler">zahid</button>--}}
</div>
<form action="{{$route}}" class="cm-filter-container" method="get" style="{{!empty(request()->get($paginationKey.'_fltr')) ? '' : 'display:none;'}}">
    <div class="cm-filter-wrapper row">
        @foreach($dataFilter as $filterKey => $filterValue)
            <div class="my-3 col-md-3">
                <h6>{{$filterValue[1]}}</h6>
                @foreach($filterValue[2] as $optionKey => $optionValue)
                    <div>
                        <input id="{{$paginationKey}}_fltr-{{$filterKey}}-{{$optionKey}}"
                               name="{{$paginationKey}}_fltr[{{$filterKey}}][]" type="checkbox" value="{{$optionKey}}"
                               {{is_array(request()->input($paginationKey.'_fltr.'.$filterKey)) && in_array($optionKey,request()->input($paginationKey.'_fltr.'.$filterKey)) ? ' checked' : ''}} class="cm-filter-checkbox">
                        <label class="cm-filter-checkbox-label"
                               for="{{$paginationKey}}_fltr-{{$filterKey}}-{{$optionKey}}">{{$optionValue}}</label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>

    @if(!empty(return_get($paginationKey.'_srch')) && !is_array(return_get($paginationKey.'_srch')))
        <input type="hidden" name="{{$paginationKey}}_srch" value="{{request()->input($paginationKey.'_srch')}}">
    @endif
    @if(!empty(return_get($paginationKey.'_comp')) && !is_array(return_get($paginationKey.'_comp')))
        <input type="hidden" name="{{$paginationKey}}_comp" value="{{request()->input($paginationKey.'_comp')}}">
    @endif
    @if(!empty(return_get($paginationKey.'_ssf')) && !is_array(return_get($paginationKey.'_ssf')))
        <input type="hidden" name="{{$paginationKey}}_ssf" value="{{request()->input($paginationKey.'_ssf')}}">
    @endif
    @if(!empty(return_get($paginationKey.'_frm')) && !is_array(return_get($paginationKey.'_frm')))
        <input type="hidden" name="{{$paginationKey}}_frm" value="{{request()->input($paginationKey.'_frm')}}">
    @endif
    @if(!empty(return_get($paginationKey.'_to')) && !is_array(return_get($paginationKey.'_to')))
        <input type="hidden" name="{{$paginationKey}}_to" value="{{request()->input($paginationKey.'_to')}}">
    @endif
    @if(!empty(return_get($paginationKey.'_sort')) && !is_array(return_get($paginationKey.'_sort')))
        <input type="hidden" name="{{$paginationKey}}_sort" value="{{request()->input($paginationKey.'_sort')}}">
    @endif
    @if(!empty(return_get($paginationKey.'_ord')) && !is_array(return_get($paginationKey.'_ord')))
        <input type="hidden" name="{{$paginationKey}}_ord" value="{{request()->input($paginationKey.'_ord')}}">
    @endif
</form>
