<section class="content content--parallax content--parallax--high top-null img-response"
         data-image="{{ asset('storage/uploads/images/large/'.$element->image) }}">
    <div class="container">
        <div class="blog-post-title blog-post-title--light">
            <h2 class="blog-post-title__title text-uppercase">{{ $element->title }}</h2>
            <div class="blog-post-title__meta">
                <div class="blog-post-title__meta__image"><a href="#"><img
                                src="{{ asset('storage/uploads/images/thumbnail/'.$element->user->user_meta->logo) }}"
                                alt=""></a></div>
                <div class="blog-post-title__meta__text">
                    <h4 class="blog-post-title__meta__text__name text-uppercase"><a
                                href="{{ route('user.show',$element->user->id) }}">{{ $element->user->name }}</a></h4>
                    <div class="blog-post-title__meta__text__date">{{ $element->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="content" data-image="{{ asset('uploads/images/large/'.$element->image) }}">
    <div class="container blog-post-content col-sm-12">
        <div class="col-lg-12">
            <div class="col-lg-6 col-sm-12">
                <h3>{{ $element->title }}
                    <hr>
                </h3>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="col-lg-6">
                    @if(isset($element->url))
                        <a href="{{ url($element->url) }}" class="btn btn--wd btn-green btn-lg">
                            <span class="fa fa-fw fa-lg fa-link"></span>
                            View {{ title_case(request()->segment(1)) }} URL
                        </a>
                    @endif
                </div>
                <div class="col-lg-6">
                    @if(!is_null($element->file))
                        <a href="{{ asset('storage/uploads/files/'.$element->file) }}"
                           class="btn btn--wd btn-green btn-lg">
                            <span class="fa fa-fw fa-lg fa-file"></span>
                            View {{ title_case(request()->segment(1)) }} File
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="divider divider-xs"></div>
        <div class="col-lg-10 col-lg-offset-1 text-justify col-sm-12">
            <p style="margin-bottom: 50px;">
                {{ $element->body }}
            </p>
        </div>
        {{--@if(!$element->tags->isEmpty())--}}
        {{--<div class="col-md-12">--}}
        {{--<ul class="tags-list">--}}
        {{--@foreach($element->tags as $tag)--}}
        {{--<li>--}}
        {{--<a href="{{ route('tag.index',['tag_id' => $tag->id, 'type' => 'event']) }}">{{ $tag->name }}</a>--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--@include('socials ...)--}}
    </div>
</section>