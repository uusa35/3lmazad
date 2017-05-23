<section class="content top-pad-none nav-submenu hidden-sm">
    <div class="container">
        <nav>
            <ul class="nav nav-justified">
                @foreach($homeCategories as $category)
                    @if($category->isParent && $category->on_homepage)
                        <li><a href="#">
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