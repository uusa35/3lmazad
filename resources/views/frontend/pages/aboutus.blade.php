@extends('frontend.layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <h2 class="text-uppercase">About Us</h2>
            <div class="card card--padding">
                @foreach($elements as $element)
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <h5 class="text-uppercase">{{ $element->title }}</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-justify"> {{ $element->body }}
                        </div>
                    </div>
                    <div class="divider divider--md"></div>
                @endforeach
            </div>
            <div class="divider divider--md"></div>
        </div>
    </section>
@endsection
