<section class="content content--fill">
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-tabs--wd" role="tablist">
            <li class="active"><a href="#auctions" aria-controls="home" role="tab" data-toggle="tab"
                                  class="text-uppercase">{{ trans('general.auctions') }}</a></li>
            <li><a href="#comments" role="tab" data-toggle="tab"
                   class="text-uppercase">{{ trans('general.comments') }}</a></li>
            {{--<li><a href="#Tab3" role="tab" data-toggle="tab" class="text-uppercase">Tags</a></li>--}}
            {{--<li><a href="#Tab4" role="tab" data-toggle="tab" class="text-uppercase">CUSTOM TAB</a></li>--}}
            {{--<li><a href="#Tab5" role="tab" data-toggle="tab" class="text-uppercase">Sizing Guide</a></li>--}}
        </ul>

        <!-- Tab panes -->
        <div class="tab-content tab-content--wd">
            <div role="tabpanel" class="tab-pane active" id="auctions">
                <div class="ui comments">
                    <h3 class="ui dividing header">{{ trans('general.auctions') }}</h3>
                    @foreach($element->auctions as $auction)
                        <div class="comment">
                            <a class="avatar">
                                <img src="{{ asset('storage/uploads/images/thumbnail/'.$auction->user->avatar) }}">
                            </a>
                            <div class="content">
                                <a class="author">{{ $auction->user->name }}</a>
                                <div class="metadata">
                                    <span class="date">{{ $auction->fromDate }}</span>
                                </div>
                                <div class="text">
                                    {{ $auction->amount }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <form class="ui reply form" method="post" action="{{ route('auction.store',['ad_id' => $element->id]) }}">
                        <div class="field">
                            <textarea>
                            </textarea>
                        </div>
                        <div class="ui blue labeled submit icon button" style=" {{ app()->isLocale('en') ? 'left : 80%;' : 'right : 80%;' }}">
                            <i class="icon edit"></i> {{ trans('general.add_reply') }}
                        </div>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="comments">
                <div class="ui comments">
                    <h3 class="ui dividing header">{{ trans('general.comments') }}</h3>
                    @foreach($element->comments as $comment)
                        <div class="comment">
                            <a class="avatar">
                                <img src="{{ asset('storage/uploads/images/thumbnail/'.$comment->user->avatar) }}">
                            </a>
                            <div class="content">
                                <a class="author">{{ $comment->user->name }}</a>
                                <div class="metadata">
                                    <span class="date">{{ $comment->fromDate }}</span>
                                </div>
                                <div class="text">
                                    {{ $comment->body }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <form class="ui reply form" method="post" action="{{ route('comment.store',['ad_id' => $element->id]) }}">
                        <div class="field">
                            <textarea>
                            </textarea>
                        </div>
                        <div class="ui blue labeled submit icon button" style=" {{ app()->isLocale('en') ? 'left : 80%;' : 'right : 80%;' }}">
                            <i class="icon edit"></i> {{ trans('general.add_reply') }}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>