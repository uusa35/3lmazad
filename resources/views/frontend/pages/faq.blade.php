@extends('frontend.layouts.app')

@section('top')
    <section class="content">
        <div class="container">
            <h2 class="text-uppercase">{{ trans("general.faq") }}</h2>
            @foreach($elements as $element)
                <div class="panel-group" id="sitemap">
                    <div class="panel panel-default" role="tablist">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" href="#collapseOne"> {{ $element->title }} </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpane-{{ $element->id }}">
                            <div class="panel-body">
                                <p>
                                    {{ $element->body }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

