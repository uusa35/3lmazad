<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
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
        <label for="avatar" class="col-md-4 control-label">{{ trans('general.avatar') }}</label>

        <div class="col-md-6">
            <input id="avatar" type="file" class="form-control" name="avatar" required>
        </div>
    </div>

    <div class="form-group">
        <label for="countries" class="col-md-4 control-label">{{ trans('general.country') }}</label>

        <div class="col-md-6">
            {{ Form::select('country_id', $countries,'Kuwait', ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-md-4 control-label">{{ trans('general.mobile') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control" name="phone"
                   value="{{ old('phone') }}" number autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-md-4 control-label">{{ trans('general.description') }}</label>

        <div class="col-md-6">
            <textarea type="text" class="form-control" name="description" aria-multiline="true" maxlength="1000"></textarea>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 pull-right">
            <button type="submit" class="btn btn--wd">
                {{ trans('general.register') }}
            </button>
        </div>
    </div>
</form>