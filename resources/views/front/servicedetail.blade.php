@extends('front.layout.app')

@section('seo_title')
{{ $service_data->seo_title }}@endsection

@section('seo_meta_description')
{{ $service_data->seo_meta_description }}@endsection

@section('main_content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$service_data->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $service_data->name }}</h1>
                </div>
            </div>
        </div>
    </div>

<div class="page-content service-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$service_data->photo) }}" alt="">
                    </div>
                    <div class="text">
                        {!! nl2br($service_data->description) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <h2>All Services</h2>
                            <ul>
                                @foreach($services as $item)
                                <li><a href="{{ route('service_detail',$item->slug); }}">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
