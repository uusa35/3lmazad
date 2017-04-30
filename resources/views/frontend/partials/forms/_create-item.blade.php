<form class="form-horizontal" method="post"
      action="{{ action('Frontend\ItemController@store') }}"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="type" value="{{ request()->item }}">
    <fieldset>
        <!-- Text input http://getbootstrap.com/css/#forms -->
        <div class="form-group">
            <div class="col-lg-12">
                <label for="name" class="control-label col-sm-4">items' name</label>
                <div class="col-sm-8">
                    <input class="form-control" name="name" placeholder="item name" type="text"/>
                </div>
            </div>
        </div>
        {{--<div class="form-group">--}}
        {{--<div class="col-lg-12">--}}
        {{--<label for="spoken_languages" class="control-label col-sm-4">Category*</label>--}}
        {{--<div class="col-sm-8">--}}
        {{--@if(!request()->item === 'product' || !request()->item === 'service')--}}
        {{--<select name="type" class="form-control type">--}}
        {{--<option value="select">select item type</option>--}}
        {{--@if(!request()->has('item'))--}}
        {{--@foreach($types as $key => $type)--}}
        {{--<option value="{{ $type }}">{{ $type }}</option>--}}
        {{--@endforeach--}}
        {{--@else--}}
        {{--<option value="{{ request()->item }}" selected>{{ request()->item }}</option>--}}
        {{--@endif--}}
        {{--</select>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group {{ !request()->has('item') ? 'hidden' : null }}" id="category_id">--}}
        {{--<div class="col-lg-12">--}}
        {{--<label for="category_id" class="control-label col-sm-4">Main Category</label>--}}
        {{--<div class="col-sm-8" id="categories">--}}
        {{--@if(request()->has('item') && request()->item === 'product')--}}
        {{--<select name="category_id" class="form-control">--}}
        {{--@foreach($categories->where('name',request()->item)->first()->children as $category)--}}
        {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group {{ !request()->has('item') ? 'hidden' : null }}" id="category_id">--}}
        {{--<div class="col-lg-12">--}}
        {{--<label for="category_id" class="control-label col-sm-4">Main Category</label>--}}
        {{--<div class="col-sm-8" id="categories">--}}
        {{--@if(request()->has('item') && request()->item === 'product')--}}
        {{--<select name="category_id" class="form-control">--}}
        {{--@foreach($categories->where('name',request()->item)->first()->children->first()->children as $category)--}}
        {{--<option value="{{ $category->id }}">{{ $category->name }}</option>--}}
        {{--@endforeach--}}
        {{--</select>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
                <!-- Button http://getbootstrap.com/css/#buttons -->
        @include('frontend.partials.forms._btn-group')
    </fieldset>
</form>
