<section class="content top-pad-none nav-submenu hidden-sm">
    <div class="container">
        <nav>
            <ul class="nav nav-justified">
                @foreach($homePageCategories as $category)
                    <li><a href="#">
                            <span class="mdi mdi-{{ $category->icon }}"></span>
                            {{ $category->name }}
                        </a></li>
                @endforeach
            </ul>
        </nav>

    </div>
</section>