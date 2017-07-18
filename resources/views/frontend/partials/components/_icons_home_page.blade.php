<section class="content top-pad-none nav-submenu hidden-sm">
    <div class="container">
        <nav>
            <ul class="nav nav-justified">
                @foreach($homeCategories as $category)
                    @if($category->on_homepage)
                        <li><a href="{{ route('ad.index',['id' => $category->id]) }}">
                            <span>
                                <i class="icon tiny {{ $category->icon }}"></i>
                            </span>
                                {{ title_case($category->name) }}
                            </a></li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</section>