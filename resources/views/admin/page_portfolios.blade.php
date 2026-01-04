@extends('admin.layout.app')

@section('heading', 'Portfolyo Sayfası İçeriği Düzenleme Paneli')

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_page_portfolios_update'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Portfolyo Sayfası Başlığı</label>
                                                    <input type="text" class="form-control" name="portfolios_heading" value="{{ $page_data->portfolios_heading }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Arkaplan</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$page_data->portfolios_banner) }}" alt="" class="profile-photo w_200">
                                                    </div>

                                                    <label class="form-label">Arkaplanı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="portfolios_banner" placeholder="Görsel seçiniz...">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">SEO Başlığı</label>
                                                    <input type="text" class="form-control" name="portfolios_seo_title" value="{{ $page_data->portfolios_seo_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">SEO Meta Özeti</label>
                                                    <input type="text" class="form-control" name="portfolios_seo_meta_description" value="{{ $page_data->portfolios_seo_meta_description }}">
                                                </div>



                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
