@extends('front.layout.app')
@section('seo_title')
{{ $search_text }} için Blog Arama Sonuçları @endsection

@section('seo_meta_description')
{{ $search_text }} için Bloglarda yapılan arama sonuçları listelenmiştir. @endsection

@section('main_content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$page_data->blog_search_banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog Arama Sonuçları: {{ $search_text }}</h1>
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
                    <div class="alert alert-info"><i class="fa fa-info-circle"></i> Yaptığınız arama için herhangi bir sonuç bulunamadı.</div>
                    <div class="col-md-4  mx-auto">
                        <h2>Başka Bir Şey Ara...</h2>
                            <div class="search">
                                <form class="row g-3" action="{{ route('search') }}" method="post">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="Bir şeyler yaz..." name="search_text">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3">Ara</button>
                                    </div>
                                </form>
                            </div>
                    </div>
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
