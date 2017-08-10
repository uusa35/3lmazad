<div class="header-line hidden-xs">
    <div class="container">
        <div class="pull-left">

            <div class="social-links">
                <ul>
                    <li class="social-links__item">
                        <a href="{{ auth()->check() ? route('ad.create') : route('register')}}">
                            {{ trans('general.create_ad') }}
                        </a>
                    </li>
                    <li class="social-links__item">
                        <a href="{{ route('lang','en') }}">
                            <img src="{{ asset('images/flags/us.png') }}" alt=""/>
                        </a>
                    </li>
                    <li class="social-links__item">
                        <a href="{{ route('lang','ar') }}">
                            <img src="{{ asset('images/flags/kw.png') }}" alt=""/>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="pull-right">
            <div class="social-links social-links--colorize">
                <ul>
                    @if(isset($contactus))
                        @if(!is_null($contactus->facebook_url))
                            <li class="social-links__item"><a class="icon icon-facebook"
                                                              href="{{ $contactus->facebook_url }}"></a></li>
                        @endif
                        @if(!is_null($contactus->twitter_url))
                            <li class="social-links__item"><a class="icon icon-twitter"
                                                              href="{{ $contactus->twitter_url }}"></a>
                            </li>
                        @endif
                        @if(!is_null($contactus->youtube_url))
                            <li class="social-links__item"><a class="icon icon-youtube"
                                                              href="{{ $contactus->youtube_url }}"></a>
                            </li>
                        @endif
                    @endif
                    {{--<li class="social-links__item"><a class="icon icon-linkedin"--}}
                    {{--href="http://www.linkedin.com/"></a></li>--}}
                    {{--<li class="social-links__item"><a class="icon icon-pinterest"--}}
                    {{--href="http://www.pinterest.com/"></a></li>--}}
                    {{--<li class="social-links__item"><a class="icon icon-mail" href="mailto:mail@google.com"></a></li>--}}
                </ul>
            </div>
        </div>
    </div>
</div>