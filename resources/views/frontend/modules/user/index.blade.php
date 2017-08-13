@extends('frontend.layouts.app')


@section('breadcrumbs')
    {!! Breadcrumbs::render('user.index',$element) !!}
@endsection

@section('content')
    <section class="content">
        <div class="container">
            <div class="card card--padding">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($allAreas->chunk(3) as $set)
                            @foreach($set as $area)
                                @if(!$elements->where('area_id',$area->id)->isEmpty())
                                    <div class="col-lg-4">
                                        <h3>{{ $area->name }}</h3>
                                        <hr>
                                        <ul>
                                            @foreach($elements->where('area_id',$area->id) as $element)
                                                <li>
                                                    <a href="{{ route('user.show',$element->id) }}">{{ $element->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
