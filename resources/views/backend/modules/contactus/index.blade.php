@extends('backend.layouts.app')

@section('content')
    <section class="product-additional__box" id="Additional">
        <h3 class="text-uppercase">info Contactus </h3>
        <h5 class="text-uppercase">Contact us</h5>
        <div class="col-lg-10 col-lg-push-1" style="padding: 10px;">
            <a href="{{ route('backend.contactus.edit',$element->id) }}" class="btn btn-primary pull-right">edit</a>
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>name</td>
                    <td>{{ $element->name }}</td>
                </tr>
                <tr>
                    <td>facebook_url</td>
                    <td>{{ $element->facebook_url }}</td>
                </tr>
                <tr>
                    <td>twitter_url</td>
                    <td>{{ $element->twitter_url }}</td>
                </tr>
                <tr>
                    <td> instagram_url</td>
                    <td>{{ $element->instagram_url }}</td>
                </tr>
                <tr>
                    <td>youtube_channel</td>
                    <td>{{ $element->youtube_url }}</td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>{{ $element->phone }}</td>
                </tr>
                <tr>
                    <td>mobile</td>
                    <td>{{ $element->mobile }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $element->email }}</td>
                </tr>
                <tr>
                    <td>address</td>
                    <td>{{ $element->address }}</td>
                </tr>
                <tr>
                    <td>latitude</td>
                    <td>{{ $element->latitude }}</td>
                </tr>
                <tr>
                    <td>longitude</td>
                    <td>{{ $element->longitude }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <img src="{{ asset('storage/uploads/images/medium/'.$element->logo) }}" alt="" class="img-responsive img-thumbnail">
        </div>
    </section>
@endsection