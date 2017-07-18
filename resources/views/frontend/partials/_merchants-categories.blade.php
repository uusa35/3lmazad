<nav>
    <ul class="nav nav-justified">
        @foreach($elements as $element)
            <li><a href="{{ route('user.index',['id' => $element->id]) }}">
                            <span>
                                <i class="icon tiny {{ $element->icon }}"></i>
                            </span>
                    {{ title_case($element->name) }}
                </a></li>
        @endforeach
    </ul>
</nav>