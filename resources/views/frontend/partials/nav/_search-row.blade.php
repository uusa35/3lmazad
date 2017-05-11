<form class="form-inline search-bar" method="get" action="{{ action('Frontend\HomeController@search') }}">
    <div class="form-group">
        <input type="text" class="form-control search-input" name="search" placeholder="Name"/>
    </div>
    <div class="form-group">
        <select name="type" class="btn btn--wd dropdown-toggle" id="typeSelect">
            <option value="">select user type</option>
            <option value="2">individual</option>
        </select>
    </div>

    <div class="form-group">
        <select name="" class="btn btn--wd dropdown-toggle" id="elementSelect">
            <option value="null">select post type</option>
            <option value="news">news</option>
            <option value="announcement">announcements</option>
            <option value="presentation">presentations</option>
        </select>
    </div>

    <div class="form-group">
        {{ Form::select('country_id', $countries,'118', ['id' => 'countryListSelect','name' => 'country','class' => 'btn btn--wd dropdown-toggle']) }}
    </div>

    <button type="submit" class="btn btn--grey">Search</button>
</form>

