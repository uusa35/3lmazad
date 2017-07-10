<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">{{ trans('general.name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">{{ trans('general.email') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email"
                   value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">{{ trans('general.password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">{{ trans('general.confirm_password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group">
        <label for="countries" class="col-md-4 control-label">{{ trans('general.country') }}</label>

        <div class="col-md-6">
            {{ Form::select('country_id', $countries,'Kuwait', ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">{{ trans('general.mobile') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control" name="phone"
                   value="{{ old('phone') }}" number autofocus>

            @if ($errors->has('phone'))
                <span class="help-block"><strong>{{ $errors->first('phone') }}</strong> </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
        <label for="role_id" class="col-md-4 control-label">Type</label>
        @foreach($roles as $key => $role)
            <div class="col-md-3">
                <div class="col-lg-1">
                    <input type="radio" class="" name="role_id" value="{{ $key }}"
                           required>
                </div>
                <div class="col-lg-2">
                    <span>{{ title_case($role) }}</span>
                </div>
            </div>
        @endforeach
    </div>


    <div class="form-group">
        <div class="col-md-6 pull-right">
            <button type="submit" class="btn btn--wd">
                {{ trans('general.register') }}
            </button>
        </div>
    </div>
</form>