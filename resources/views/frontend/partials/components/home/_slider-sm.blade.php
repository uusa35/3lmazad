<div class="category-slider single-slider">
    <ul class="animated-arrows">
        @foreach($sliders as $slider)
            <li><img src="{{ asset('storage/uploads/images/medium/'.$slider->image) }}" alt=""
                     class="slider-img"/>
                <div class="single-slider__text">
                    {{--<h2><strong></strong></h2>--}}
                    @if(!is_null($slider->title))
                        <h3>{{ $slider->title }}</h3>
                    @endif
                    @if(!is_null($slider->url))
                        <a href="{{ $slider->url }}" class="btn btn--wd btn--lg text-uppercase">{{ $slider->title }}</a>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="divider divider--sm visible-xs visible-sm"></div>
