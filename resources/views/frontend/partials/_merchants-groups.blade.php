<nav>
    @foreach($elements->chunk(4) as $set)
        <ul class="nav nav-justified">
            @foreach($set as $element)
                <li>
                    <a href="{{ route('user.index',['id' => $element->id]) }}"
                       class="btn text-justified nav-btn-groups {{ !in_array($element->id,$activeGroups,true) ? 'disabled btn-default' : null  }}">
                            <span>
                                <i class="icon tiny {{ $element->icon }}"></i>
                            </span>
                        {{ $element->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endforeach
</nav>