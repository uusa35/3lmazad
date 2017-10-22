<!-- Breadcrumb section -->
@if (isset($breadcrumbs))
    <section class="breadcrumbs breadcrumbs-boxed hidden-xs">
        <div class="container">
            <ol class="breadcrumb breadcrumb--wd pull-left">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$breadcrumb->last)
                        <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li class="active">{{ $breadcrumb->title }}</li>
                    @endif
                @endforeach
            </ol>
            {{--<ul id="productOther" class="product-other pull-right hidden-xs">--}}
            {{--<li class="product-other__link product-prev"><a href="#">Fast Seconds Knit White</a><span--}}
            {{--class="product-other__link__image"><img src='images/products/product-4.jpg'/></span></li>--}}
            {{--<li class="product-other__link product-next"><a href="#">Unconditional Dress White</a><span--}}
            {{--class="product-other__link__image"><img src='images/products/product-3.jpg'/></span></li>--}}
            {{--</ul>--}}
        </div>
    </section>
@endif