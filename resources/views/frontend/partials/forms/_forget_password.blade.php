<div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">{{ trans('general.email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
            {{--<label for="password" class="col-md-4 control-label">{{ trans('general.password') }}</label>--}}

            {{--<div class="col-md-6">--}}
                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                {{--@if ($errors->has('password'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
            {{--<label for="password-confirm" class="col-md-4 control-label">{{ trans('general.confirm_password') }}</label>--}}
            {{--<div class="col-md-6">--}}
                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}

                {{--@if ($errors->has('password_confirmation'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <div class="col-md-3 pull-right">
                <button type="submit" class="btn btn--wd">
                    {{ trans('general.reset_password') }}
                </button>
            </div>
        </div>
    </form>
</div>