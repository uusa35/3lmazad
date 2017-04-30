<div class="brands brands-carousel animated-arrows mobile-special-arrowss">
    @foreach($elements as $element)
        <div class="brands__item">
            <a href="{{ route('user.show',$element->id) }}">
                <img class="img-responsive" src="{{ asset('storage/uploads/images/thumbnail/'.$element->user_meta->logo) }}"
                     data-lazy="{{ asset('storage/uploads/images/thumbnail/'.$element->user_meta->logo) }}"
                     alt="{{ $element->name }}"/>
            </a>
        </div>
    @endforeach
</div>
