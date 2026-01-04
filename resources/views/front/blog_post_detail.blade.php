@extends('front.layout.app')

@section('seo_title')
{{ $post_detail->seo_title }}@endsection

@section('seo_meta_description')
{{ $post_detail->seo_meta_description }}@endsection

@section('open_graph_data')
<meta property="og:title" content="{{ $post_detail->title }}" />
<meta property="og:url" content="{{ route('post_detail',$post_detail->slug); }}" />
<meta property="og:description" content="{{ $post_detail->short_description }}" />
<meta property="og:image" content="{{ asset('uploads/'.$post_detail->photo) }}" />
@endsection

@section('main_content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$post_detail->banner) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $post_detail->title }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$post_detail->photo) }}" alt="">
                    </div>
                    <div class="sub d-flex justify-content-start">
                        <div class="author"><span>By:</span> {{ $admin_data->name }}</div>
                        <div class="dash"> - </div>
                        <div class="date"><span>On:</span> {{ $post_detail->created_at->format('d F Y') }}</div>
                        <div class="dash"> - </div>
                        <div class="category"><span>Category:</span> <a href="{{ route('category_detail',$post_detail->rPostCategory->category_slug); }}">{{ $post_detail->rPostCategory->category_name }}</a></div>
                    </div>
                    <div class="text">
                         {!! nl2br($post_detail->description) !!}
                    </div>

                    <div class="share">
                        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=633263d3bfbc4500128cca2f&product=inline-share-buttons" async="async"></script>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>


                    @if($post_detail->show_comment)
                        <div class="comment">
                            <h2>@if($totalCommentCount>0)
                                Toplam Yorum Sayısı: {{ $totalCommentCount }}
                                @else
                                Bu gönderi için yorum yapılmamış.
                                @endif
                            </h2>

                        <div class="comment-section">

                            @foreach($comments as $item)
                            <div class="comment-box d-flex justify-content-start">
                                <div class="left">
                                    @php
                                        $grav_url = "https://www.gravatar.com/avatar/" . hash( "sha256", strtolower( trim( $item->person_email ) ) ) . "?d=" . urlencode('https://cdn-icons-png.flaticon.com/256/6897/6897018.png') . "&s=128";
                                    @endphp
                                    <img src="{{ $grav_url }}" alt="Avatar">
                                </div>
                                <div class="right">
                                    <div class="name">{{ $item->person_name }}
                                    @if($item->person_type==1)
                                    <span class="badge bg-danger">Admin</span>
                                    @endif
                                    </div>
                                    <div class="date">{{ $item->created_at->format('d F Y') }}</div>
                                    <div class="text">{!! nl2br($item->person_comment) !!}</div>
                                    <div class="reply">
                                        <a href="" data-bs-toggle="modal" data-bs-target="#replymodal-{{ $item->id }}"><i class="fas fa-reply"></i> Yanıtla</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="replymodal-{{ $item->id }}" tabindex="-1" aria-labelledby="replymodalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="replymodalLabel">Yorum Cevaplama Ekranı</h1>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Kapat</button>
                                    </div>
                                    <div class="modal-body">
                                        @if(Auth::guard('admin')->user())
                                            <form action="{{ route('reply_submit_admin') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <b>{{ $item->person_name }}</b> kullanıcısına cevap yazıyorsunuz...
                                                        </div>
                                                        <div class="alert alert-info mb-2">{{ Auth::guard('admin')->user()->name }} ({{ Auth::guard('admin')->user()->email }}) olarak oturum açtınız.</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="3" name="person_comment" placeholder="Yorumunuz"></textarea>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="hidden" name="post_id" value="{{ $item->post_id }}">
                                                    <input type="hidden" name="comment_id" value="{{ $item->id }}">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Gönder</button>
                                                    </div>

                                                </div>
                                            </form>
                                        @else
                                            <form action="{{ route('reply_submit') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <b>{{ $item->person_name }}</b> kullanıcısına cevap yazıyorsunuz...
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="person_name" placeholder="Adınız">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="person_email" placeholder="E-Posta Adresiniz">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="3" name="person_comment" placeholder="Yorumunuz"></textarea>
                                                </div>
                                                <div class="mb-1">
                                                    <input type="hidden" name="post_id" value="{{ $item->post_id }}">
                                                    <input type="hidden" name="comment_id" value="{{ $item->id }}">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Gönder</button>
                                                    </div>

                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!--// Modal -->

                                <!-- Cevap Yorumlar -->
                                @foreach($item->rReply as $item2)
                                    <div class="comment-box reply-box d-flex justify-content-start">
                                        <div class="left">
                                            @php
                                                $grav_url = "https://www.gravatar.com/avatar/" . hash( "sha256", strtolower( trim( $item2->person_email ) ) ) . "?d=" . urlencode('https://cdn-icons-png.flaticon.com/256/6897/6897018.png') . "&s=128";
                                            @endphp
                                            <img src="{{ $grav_url }}" alt="Avatar">
                                        </div>
                                        <div class="right">
                                            <div class="name">{{ $item2->person_name }}
                                                @if($item2->person_type==1)
                                                <span class="badge bg-danger">Admin</span>
                                                @endif
                                            </div>
                                            <div class="date">{{ $item2->created_at->format('d F Y') }}</div>
                                            <div class="text">{!! nl2br($item2->person_comment) !!}</div>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Cevap Yorumlar Bitiş-->
                                <div class="mb-1"></div>
                            @endforeach





                            <h2 class="mt_40">Yorum Yazın</h2>

                            @if(Auth::guard('admin')->user())
                                <div class="alert alert-info mb-2">{{ Auth::guard('admin')->user()->name }} ({{ Auth::guard('admin')->user()->email }}) olarak oturum açtınız. <a href="{{ route('admin_logout') }}">Çıkış.</a></div>
                                <form action="{{ route('comment_submit_admin') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3" name="person_comment" placeholder="Yorumunuz"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="post_id" value="{{ $post_detail->id }}">
                                        <button type="submit" class="btn btn-primary">Gönder</button>
                                    </div>
                                </form>
                            @else

                            <form action="{{ route('comment_submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="person_name" placeholder="Adınız">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" name="person_email" placeholder="E-Posta Adresiniz">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" rows="3" name="person_comment" placeholder="Yorumunuz"></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="post_id" value="{{ $post_detail->id }}">
                                    <button type="submit" class="btn btn-primary">Gönder</button>
                                </div>
                            </form>

                            @endif

                        </div>
                    </div>

                    @else
                    <div class="alert alert-warning m-2">
                        <i class="fa fa-info-circle"></i> Bu içerik için yorum fonksiyonu kapalıdır.
                    </div>
                    @endif


                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <h2>Blogda Ara</h2>
                            <div class="search">
                                <form class="row g-3" action="{{ route('search') }}" method="post">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="Bir şeyler yaz ..." name="search_text">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3">Ara</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Son Yazılar</h2>
                            <ul>
                                @foreach ($posts as $item)
                                <li><a href="{{ route('post_detail',$item->slug); }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h2>Kategoriler</h2>
                            <ul>
                                @foreach ($post_categories as $item)
                                <li><a href="{{ route('category_detail',$item->category_slug); }}">{{ $item->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h2>Arşivler</h2>
                            <ul>
                                @foreach($archive_results as $item)
                                @php
                                    $date_month=date("m", strtotime("$item->month"));
                                @endphp
                                    <li><a href="{{ route('archive_detail',['month' => $date_month, 'year'=>$item->year]); }}">{{ $item->month }} {{ $item->year }} ({{ $item->data }})</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
