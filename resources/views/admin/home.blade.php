@extends('admin.layout.app')

@section('heading', 'Pano')

@section('main_content')
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Toplam Blog Yazısı <a href="{{ route('admin_post_show') }}"><i class="fas fa-arrow-right"></i></a> </h4>
                                </div>
                                <div class="card-body">
                                    {{ $post_count }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Onay Bekleyen Yorumlar <a href="{{ route('admin_comment_pending') }}"><i class="fas fa-arrow-right"></i></a></h4>
                                </div>
                                <div class="card-body">
                                    {{ $pending_comments_count }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-comments"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Onay Bekleyen Yanıtlar <a href="{{ route('admin_reply_pending') }}"><i class="fas fa-arrow-right"></i></a></h4>
                                </div>
                                <div class="card-body">
                                    {{ $pending_replies_count }}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
