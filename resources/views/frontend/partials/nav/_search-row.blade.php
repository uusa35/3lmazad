<form class="form-inline search-bar" method="get" action="{{ action('Frontend\HomeController@search') }}">
    <div class="form-group">
        <input type="text" class="form-control search-input" name="search" placeholder="Amount"/>
    </div>
    <div class="form-group">
        <select name="type" class="btn btn--wd dropdown-toggle">
            <option value="">select category</option>
            @foreach($roles as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
            <option value="news">news</option>
            <option value="announcement">announcements</option>
            <option value="presentation">presentations</option>
        </select>
    </div>
    <button type="submit" class="btn btn--wd">Search</button>
</form>

