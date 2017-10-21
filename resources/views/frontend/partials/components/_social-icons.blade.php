<div class="social-links social-links--colorize">
    @if(isset($contactus))
        <ul>
            @if(!empty($contactus->facebook_url))
                <li class="social-links__item">
                    <a href="{{ $contactus->facebook_url }}">
                        <span class="icon icon-facebook"></span>
                    </a>
                </li>
            @endif
            @if(!empty($contactus->twitter_url))
                <li class="social-links__item">
                    <a href="{{ $contactus->twitter_url }}">
                        <span class="icon icon-twitter"></span>
                    </a>
                </li>
            @endif
            @if(!empty($contactus->youtube_channel))
                <li class="social-links__item"><a class="" href="{{ $contactus->youtube_channel }}">
                        <span class="icon icon-youtube"></span>
                    </a></li>
            @endif
            @if(!empty($contactus->instagram_url))
                <li class="social-links__item"><a class="" href="{{ $contactus->instagram_url }}">
                        <span class="icon icon-instagram"></span>
                    </a></li>
            @endif
        </ul>
    @endif
</div>