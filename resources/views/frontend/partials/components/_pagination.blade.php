@if(isset($elements))
    <div class="col-lg-10 pull-right">
        <ul class="pagination pull-right">
            {{ $elements->appends(['id' => request()->id,
            'parent' => request()->parent,
            'area_id' => request()->area_id,
            'sub' => request()->sub,
            'search' => request()->search,
            'min' => request()->min,
            'max' => request()->max,
            'brand_id' => request()->brand_id,
            'model_id' => request()->model_id,
            'color_id' => request()->color_id,
            'size_id' => request()->size_id,
            'manufacturing_year' => request()->manufacturing_year,
            'is_new' => request()->is_new,
            'is_automatic' => request()->is_automatic,
            'mileage' => request()->mileage,
            'is_furnished' => request()->is_furnished,
            'floor_no' => request()->floor_no,
            'building_age' => request()->building_age,
            'bathroom_no' => request()->bathroom_no,
            'room_no' => request()->room_no,
            'type_id' => request()->type_id,
            'space' => request()->space,
            'rent_type' => request()->rent_type,
            ]) }}
        </ul>
    </div>
@endif