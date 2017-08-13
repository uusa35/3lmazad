<nav>
    @foreach($elements->chunk(5) as $set)
        <ul class="nav nav-justified">
            @foreach($set as $element)
                <li>
                    <a href="{{ route('user.index',['id' => $element->id]) }}"
                       class="btn text-justified {{ $element->users->isEmpty() ? 'disabled btn-default' : null  }}"
                       style="width: 200px;">
                            <span>
                                <i class="icon tiny {{ $element->icon }}"></i>
                            </span>
                        {{ title_case($element->name) }}
                    </a></li>
            @endforeach
        </ul>
    @endforeach
</nav>