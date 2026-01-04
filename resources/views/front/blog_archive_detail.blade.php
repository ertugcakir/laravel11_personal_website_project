@extends('front.layout.app')
@section('seo_title')
Blog Arşivi: {{ $month }}/{{ $year }} @endsection

@section('seo_meta_description')
{{ $month }}/{{ $year }} tarihi için blog gönderileri listelenmektedir. @endsection

@section('main_content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$page_data->blog_archive_banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog Arşivi: {{ $month }}/{{ $year }}</h1>
                </div>
            </div>
        </div>
    </div>

<div class="page-content blog">
        <div class="container">
            <div class="row">

                @foreach($posts as $item)
                <div class="col-md-4">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$item->photo) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="text">
                            <h3>{{ $item->title }}</h3>
                            <p>
                                {{ $item->short_description }}
                            </p>
                            <div class="button">
                                <a href="{{ route('post_detail',$item->slug); }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @if(count($posts)==0)
                    <div class="alert alert-info"><i class="fa fa-info-circle"></i> Bu kategori için herhangi bir yazı bulunamadı.</div>
                @endif




            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
