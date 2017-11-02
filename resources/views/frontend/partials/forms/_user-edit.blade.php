<form class="form-horizontal" role="form" method="POST" action="{{ route('user.update',$element->id) }}"
      enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT"/>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ $element->name }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email"
                   value="{{ $element->email }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-4 control-label">{{ trans('general.mobile') }}</label>

        <div class="col-md-6">
            <input id="mobile" type="number" class="form-control" name="mobile"
                   value="{{ $element->mobile }}">

            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
        <label for="avatar" class="col-md-4 control-label">{{ trans('general.avatar') }}</label>

        <div class="col-md-6">
            <input id="avatar" type="file" class="form-control" name="avatar">
            @if ($errors->has('avatar'))
                <span class="help-block"><strong>{{ $errors->first('avatar') }}</strong></span>
            @endif
        </div>
    </div>


    {{--<div class="form-group">--}}
    {{--<label for="countries" class="col-md-4 control-label">Country</label>--}}

    {{--<div class="col-md-6">--}}
    {{--{{ Form::select('country_id', $countries,$element->country_id, ['class' => 'form-control']) }}--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="form-group">
        <label for="area" class="col-md-4 control-label">{{ trans('general.area') }}</label>

        <div class="col-md-6">
            {{ Form::select('area_id', $areas, $element->area_id, ['class' => 'form-control']) }}
        </div>
    </div>

    @if(!auth()->user()->isAdmin)
        <div class="form-group">
            <label for="role_id" class="col-md-4 control-label">{{ trans('general.account_type') }}</label>

            <div class="col-md-3">
                <div class="col-lg-1">
                    <input type="radio" class="" name="is_merchant" value="1"
                           {{ $element->isMerchant ? 'checked' : null }}
                           required disabled>
                </div>
                <div class="col-lg-2">
                    <span>{{ trans('general.merchant') }}</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col-lg-1">
                    <input type="radio" class="" name="is_merchant" value="0"
                           {{ !$element->isMerchant ? 'checked' : null }}
                           required>
                </div>
                <div class="col-lg-2">
                    <span>{{ trans('general.regular_user') }}</span>
                </div>
            </div>
        </div>
    @endif

    <div class="form-group hidden merchant-group {{ $errors->has('address') ? ' has-error' : '' }}" id="address">
        <label for="name" class="col-md-4 control-label">{{ trans('general.address') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="address"
                   value="{{ old('address') }}" autofocus>

            @if ($errors->has('address'))
                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group hidden merchant-group" id="phone">
        <label for="name" class="col-md-4 control-label">{{ trans('general.office_phone') }}</label>

        <div class="col-md-6">
            <input id="mobile" type="text" class="form-control" name="phone"
                   value="{{ old('phone') }}" number autofocus>
        </div>
    </div>

    <div class="form-group hidden merchant-group {{ $errors->has('timing') ? ' has-error' : '' }}" id="timing">
        <label for="name" class="col-md-4 control-label">{{ trans('general.timing') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="timing" placeholder="{{ trans('message.timing') }}"
                   value="{{ old('timing') }}" autofocus>

            <span class="help-block">{{ trans("message.timing") }}</span>
            @if ($errors->has('timing'))
                <span class="help-block">{{ trans("message.timing") }}
                    <strong>{{ $errors->first('timing') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-md-4 control-label">{{ trans('general.brief') }}</label>

        <div class="col-md-6">
            <textarea type="text" class="form-control" name="description" aria-multiline="true"
                      maxlength="1000"></textarea>
        </div>
    </div>


    @include('backend.partials.forms._btn-group')
</form>