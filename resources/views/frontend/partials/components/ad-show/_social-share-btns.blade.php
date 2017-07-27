@if(isset($link))
    <div class="social-links social-links--colorize social-links--invert social-links--padding pull-right">
        <ul>
            <li class="social-links__item">
                <a class="icon icon-facebook tooltip-link" href="http://www.facebook.com/sharer.php?u={{ $link }}"
                   data-placement="top" data-toggle="tooltip"
                   data-original-title="{{ trans('general.share_on_facebook') }}">
                </a>
            </li>
            <li class="social-links__item">
                <a class="icon icon-twitter tooltip-link" href="https://twitter.com/share?url={{ $link }}"
                   data-placement="top" data-toggle="tooltip"
                   data-original-title="{{ trans('general.share_on_twitter') }}"></a></li>
            <li class="social-links__item">
                <a class="icon icon-google tooltip-link" href="https://plus.google.com/share?url={{ $link }}"
                   data-placement="top" data-toggle="tooltip"
                   data-original-title="{{ trans('general.share_on_google') }}"></a></li>
            {{--<li class="social-links__item">--}}
            {{--<a class="icon icon-pinterest tooltip-link" href="#" data-placement="top" data-toggle="tooltip"--}}
            {{--data-original-title="Share on pinterest"></a></li>--}}
        </ul>
    </div>
@endif