@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('user.index') !!}
@endsection

@section('top')
    <section class="content">
        <div class="container">
            <div class="card card--padding">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($areas->chunk(3) as $set)
                        {{ dd($set) }}
                        @foreach($set as $area)
                            {{ dd($area) }}
                            <div class="col-lg-4">
                                {{ dd($area) }}
                                <h3>{{ $area->name }}</h3>
                                {{--<ul>--}}
                                    {{--@foreach($elements->where('area_id', $area->id) as $element)--}}
                                        {{--<li>{{ $element->name }}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            @include('frontend.partials.components._pagination')
        </div>
        </div>
    </section>
@endsection
