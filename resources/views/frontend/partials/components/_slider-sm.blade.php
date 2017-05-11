<div class="category-slider single-slider">
    <ul class="animated-arrows">
        @foreach($sliders as $slider)
            <li><img src="{{ asset('storage/uploads/images/medium/'.$slider->image) }}" alt=""
                     style="max-height : 450px;"/>
                <div class="single-slider__text">
                    {{--<h2><strong></strong></h2>--}}
                    <h3>{{ $slider->title }}</h3>
                    {{--<h4>the New & Exiting 2016 Collection</h4>--}}
                    <a href="{{ $slider->url }}" class="btn btn--wd btn--lg text-uppercase">{{ $slider->title }}</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="divider divider--sm visible-xs visible-sm"></div>
