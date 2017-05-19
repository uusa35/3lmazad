<section class="content top-pad-none nav-submenu hidden-sm">
    <div class="container">
        <nav>
            <ul class="nav nav-justified">
                @foreach($homePageCategories as $category)
                    <li><a href="#">
                            <span>
                                <i class="icon tiny {{ $category->icon }}"></i>
                            </span>
                            {{ title_case($category->name) }}
                        </a></li>
                @endforeach
            </ul>
        </nav>

    </div>
</section>