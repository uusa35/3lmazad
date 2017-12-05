@if(isset($element) && $element->has('brands') && !$element->brands->isEmpty())
    <section class="content top-pad nav-submenu">
        <div class="container">
            <nav>
                <ul class="nav nav-justified">
                    {{--http://3almazad.com/search?parent=1&search=&area_id=0&city_id=0&brand_id=11&rent_type=0&model_id=0&is_new=0&is_automatic=0&color_id=0&size_id=0&manufacturing_year=&mileage=&is_furnished=0&floor_no=&building_age=0&bathroom_no=0&room_no=&type_id=0&space=--}}
                    @foreach($element->brands as $b)
                        {!! $loop->index % 12 === 0 ? '</br>' : null !!}
                            <li class="text-center">
                                <a href="{{ route('search',['parent' => $element->id,'brand_id' => $b->id]) }}"
                                   style="display: flex; width: 100px; height: 100px; flex-direction: row; flex-wrap: wrap; justify-content : space-around; alignItems: center">
                                    <img class="img-responsive img-circle"
                                         style="width: 50px; height: 50px; margin: 5px;"
                                         src="{{ asset('storage/uploads/images/thumbnail/'.$b->image) }}"
                                         alt="{{ $b->name_ar . $b->name_en }}"
                                    />
                                <span style="width: 100%; font-size: small;">
                                    {{ title_case($b->name) }}
                                </span>
                                </a>
                            </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </section>
@endif