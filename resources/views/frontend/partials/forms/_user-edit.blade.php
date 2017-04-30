<form class="form-horizontal" role="form" method="POST" action="{{ route('user.update',auth()->user()->id) }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT"/>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                   value="{{ $user->name }}" required autofocus>

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
                   value="{{ $user->email }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>
    </div>


    <div class="form-group">
        <label for="countries" class="col-md-4 control-label">Country</label>

        <div class="col-md-6">
            {{ Form::select('country_id', $countries,$user->country_id, ['class' => 'form-control']) }}
        </div>
    </div>

    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
        <label for="role_id" class="col-md-4 control-label">Type</label>
        @if(auth()->user()->isCompany)
            @foreach($roles as $key => $role)
                <div class="col-md-3">
                    <div class="col-lg-1">
                        <input type="radio" class="" name="role_id" value="{{ $key }}"
                               {{ $userRole->first()->id === $key ? 'checked' : null }}
                               required>
                    </div>
                    <div class="col-lg-2">
                        <span>{{ $role }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-3">
                <div class="col-lg-1">
                    <input type="radio" class="" name="role_id" value="2" required>
                </div>
                <div class="col-lg-2">
                    <span>Indiviual</span>
                </div>
            </div>
        @endif
        <div class="col-lg-5">
            @if ($errors->has('role_id'))
                <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    @include('frontend.partials.forms._btn-group')
</form>