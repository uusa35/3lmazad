<form class="form-horizontal" method="post"
      action="{{ action('Frontend\ItemAgencyController@update',$element->id) }}"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="patch">
    <fieldset>
        <!-- Text input http://getbootstrap.com/css/#forms -->
        <div class="form-group">
            <div class="col-lg-12">
                <label for="file" class="control-label col-sm-4">phone</label>
                <div class="col-sm-8">
                    <input class="form-control" name="phone" placeholder="phone" value="{{ $element->phone }}" type="text"/>
                    <p class="help-block">only numbers are allowed</p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <label for="file" class="control-label col-sm-4">fax</label>
                <div class="col-sm-8">
                    <input class="form-control" name="fax" placeholder="fax" value="{{ $element->fax }}" type="text"/>
                    <p class="help-block">only numbers are allowed</p>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <label for="file" class="control-label col-sm-4">email</label>
                <div class="col-sm-8">
                    <input class="form-control" name="email" placeholder="email" value="{{ $element->email }}" type="text"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <label for="countries" class="col-md-4 control-label">Country</label>

                <div class="col-md-8">
                    {{ Form::select('country_id', $countries, $element->country_id, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>

        @include('frontend.partials.forms._btn-group')
    </fieldset>
</form>
