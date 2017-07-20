<div class="ui icon input tooltip-message"
     data-inverted=""
     data-tooltip="{{ trans('message.keyword_field') }}">
    <i class="search icon"></i>
    <input type="text" class="search-input search-input-keyword "
           name="search"
           value=""
           required
           oninvalid="this.setCustomValidity('{!! trans('general.keyword_message') !!}')"
           placeholder="{{ trans('general.keyword') }}"/>
</div>