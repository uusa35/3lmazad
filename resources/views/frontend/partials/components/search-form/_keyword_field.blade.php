<div class="ui icon input tooltip-message"
     data-position="top center"
     data-inverted=""
     data-tooltip="{{ trans('general.keyword_message') }}"
>
    <i class="search icon"></i>
    <input type="text" class="search-input search-input-keyword"
           name="search"
           value=""
           required
           {{--oninvalid="this.setCustomValidity('{!! trans('general.keyword_message') !!}')"--}}
           placeholder="{{ trans('general.keyword') }}"/>
</div>