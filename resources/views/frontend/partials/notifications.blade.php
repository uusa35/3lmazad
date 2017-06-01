@section('notification')
    <div class="" style="display: flex; justify-content : center; align-content center; width: 100%; margin-top: 10px;">
        @if ($message = Session::get('success'))
            <div class="alert home-alert home-alert home-alert alert-success alert-block" role="alert">
                <div class="col-lg-2">
                    <i class="fa fa-2x fa-check-circle-o fa-fw"></i>
                </div>
                <div class="col-lg-20">
                    <button type="button" class="close" data-dismiss="alert"
                            style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }}">&times;</button>
                    @if(is_array($message))
                        @foreach ($message as $m)
                            {{ $m }}
                        @endforeach
                    @else
                        {{ $message }}
                    @endif
                </div>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert home-alert alert-danger alert-block">
                <div class="col-lg-2">
                    <i class="remove big icon"></i>
                </div>
                <div class="col-lg-10">
                    <button type="button" class="close" data-dismiss="alert"
                            style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }}">&times;</button>
                    @if(is_array($message))
                        @foreach ($message as $m)
                            {{ $m }}
                        @endforeach
                    @else
                        {{ $message }}
                    @endif
                </div>
            </div>
    </div>
    @endif

    @if ($message = Session::get('errors'))
        <div class="alert home-alert alert-danger alert-block">
            <div class="col-lg-2">
                <i class="remove circle big icon"></i>
            </div>
            <div class="col-lg-10">
                <button type="button" class="close" data-dismiss="alert"
                        style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }}">&times;</button>
                @if($message->all())
                    @foreach ($message->all() as $m)
                        <li>{{ $m }}  </li>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert home-alert alert-warning alert-block">
            <div class="col-lg-2">
                <i class="remove circle big icon"></i>
            </div>
            <div class="col-lg-10">
                <button type="button" class="close" data-dismiss="alert"
                        style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }}">&times;</button>
                @if(is_array($message))
                    @foreach ($message as $m)
                        {{ $m }}
                    @endforeach
                @else
                    {!! $message !!}
                @endif
            </div>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="alert home-alert alert-info alert-block">
            <div class="col-lg-2">
                <i class="remove circle big icon"></i>
            </div>
            <div class="col-lg-10">
                <button type="button" class="close" data-dismiss="alert"
                        style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }}">&times;</button>
                @if(is_array($message))
                    @foreach ($message as $m)
                        {{ $m }}
                    @endforeach
                @else
                    {{ $message }}
                @endif
            </div>
        </div>
        <hr>
        @endif
        </div>
        <div id="pushNotification" class="hidden">
            <div class=" alert home-alert alert-success alert-block" role="alert">

                <div class="col-lg-2">
                    <i class="remove circle big icon"></i>
                </div>
                <div class="col-lg-10">
                    <button type="button" class="close" data-dismiss="alert"
                            style="float : {{ app()->isLocale('ar') ? 'left' : 'right' }}">&times;</button>
                    <div id="message"></div>
                </div>

            </div>
        </div>
        <div class="divider divider--xs"></div>
@show