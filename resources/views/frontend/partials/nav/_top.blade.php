<div class="header-line hidden-xs">
    <div class="container">
        @if(!auth()->check())
            <div class="pull-left">
                <div class="user-links">
                    <ul>
                        @if(!auth()->check())
                            <li class="user-links__item"><a href="{{ route('login') }}">{{ trans('general.login') }}</a>
                            </li>
                        @endif
                        @if(auth()->check())
                            <li class="user-links__item"><a
                                        href="{{ route('register') }}">{{ trans('general.register') }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        @endif
        <div class="pull-right">
            <div class="social-links social-links--colorize">
                <ul>
                    @if(!is_null($contactus->facebook_url))
                        <li class="social-links__item"><a class="icon icon-facebook"
                                                          href="http://www.facebook.com/"></a></li>
                    @endif
                    @if(!is_null($contactus->twitter_url))
                        <li class="social-links__item"><a class="icon icon-twitter" href="http://www.twitter.com/"></a>
                        </li>
                    @endif
                    @if(!is_null($contactus->google_url))
                        <li class="social-links__item"><a class="icon icon-google" href="http://www.google.com/"></a>
                        </li>
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