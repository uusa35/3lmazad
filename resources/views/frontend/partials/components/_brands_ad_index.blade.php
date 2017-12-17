@if(isset($element) && $element->has('brands') && !$element->brands->isEmpty())
    <section class="content top-pad nav-submenu">
        <div class="container">
            <nav>
                <ul class="nav nav-justified">
                    {{--http://3almazad.com/search?parent=1&search=&area_id=0&city_id=0&brand_id=11&rent_type=0&model_id=0&is_new=0&is_automatic=0&color_id=0&size_id=0&manufacturing_year=&mileage=&is_furnished=0&floor_no=&building_age=0&bathroom_no=0&room_no=&type_id=0&space=--}}
                    @foreach($element->brands as $b)
                        @if($loop->index < 10)
                            <li class="text-center">
                                <a href="{{ route('search',['parent' => $element->id,'brand_id' => $b->id]) }}"
                                   style="text-align: center;">
                                    <img class="img-responsive img-circle"
                                         style="width : 100px; height: 100px; text-align: center; margin-right: auto;margin-left: auto;margin-bottom: 10px;"
                                         src="{{ asset('storage/uploads/images/thumbnail/'.$b->image) }}"
                                         alt="{{ $b->name_ar . $b->name_en }}"
                                    />
                                <span style="width: 100%; font-size: small;">
                                    {{ title_case($b->name) }}
                                </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <nav>
                <ul class="nav nav-justified">
                    {{--http://3almazad.com/search?parent=1&search=&area_id=0&city_id=0&brand_id=11&rent_type=0&model_id=0&is_new=0&is_automatic=0&color_id=0&size_id=0&manufacturing_year=&mileage=&is_furnished=0&floor_no=&building_age=0&bathroom_no=0&room_no=&type_id=0&space=--}}
                    @foreach($element->brands as $b)
                        @if($loop->index >= 10 && $loop->index < 20)
                            <li class="text-center">
                                <a href="{{ route('search',['parent' => $element->id,'brand_id' => $b->id]) }}"
                                   style="text-align: center;">
                                    <img class="img-responsive img-circle"
                                         style="width : 100px; height: 100px; text-align: center; margin-right: auto;margin-left: auto;margin-bottom: 10px;"
                                         src="{{ asset('storage/uploads/images/thumbnail/'.$b->image) }}"
                                         alt="{{ $b->name_ar . $b->name_en }}"
                                    />
                                <span style="width: 100%; font-size: small;">
                                    {{ title_case($b->name) }}
                                </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
            <nav>
                <ul class="nav nav-justified">
                    {{--http://3almazad.com/search?parent=1&search=&area_id=0&city_id=0&brand_id=11&rent_type=0&model_id=0&is_new=0&is_automatic=0&color_id=0&size_id=0&manufacturing_year=&mileage=&is_furnished=0&floor_no=&building_age=0&bathroom_no=0&room_no=&type_id=0&space=--}}
                    @foreach($element->brands as $b)
                        @if($loop->index >= 20 && $loop->index < 30)
                            <li class="text-center">
                                <a href="{{ route('search',['parent' => $element->id,'brand_id' => $b->id]) }}"
                                   style="text-align: center;">
                                    <img class="img-responsive img-circle"
                                         style="width : 100px; height: 100px; text-align: center; margin-right: auto;margin-left: auto;margin-bottom: 10px;"
                                         src="{{ asset('storage/uploads/images/thumbnail/'.$b->image) }}"
                                         alt="{{ $b->name_ar . $b->name_en }}"
                                    />
                                <span style="width: 100%; font-size: small;">
                                    {{ title_case($b->name) }}
                                </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        </div>
    </section>
@endif