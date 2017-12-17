<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{ trans("general.email") }}</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ old('email') }}"
                           required autofocus {{ session()->get('make_disabled') }}>

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
                <div class="col-md-8 col-md-offset-4">
                    <div class="checkbox">
                        <label>

                            {{ trans('general.remember_me') }}
                        </label>
                        <input type="checkbox"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn--wd default-bg-orange">
                        {{ trans("general.login") }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>