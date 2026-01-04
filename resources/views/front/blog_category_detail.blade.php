@extends('front.layout.app')
@section('seo_title')
{{ $category->category_seo_title }}@endsection

@section('seo_meta_description')
{{ $category->category_seo_meta_description }}@endsection

@section('main_content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.($category->category_banner ? $category->category_banner:$page_data->blog_banner)) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $category->category_name }}</h1>
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
