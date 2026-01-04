@extends('admin.layout.app')

@section('heading', 'Hakkımda Sayfası İçeriği Düzenleme Paneli')

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_page_about_update'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Hakkımda Sayfası Başlığı</label>
                                                    <input type="text" class="form-control" name="about_heading" value="{{ $page_data->about_heading }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Banner</label>
                                                    <div class="mb-4">
                                                        @if($page_data->about_banner=="")
                                                        <span class="text-danger">Banner bulunamadı.</span>
                                                        @else
                                                            <img src="{{ asset('uploads/'.$page_data->about_banner) }}" alt="" class="profile-photo w_200">
                                                        @endif
                                                     </div>

                                                    <label class="form-label">Bannerı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="about_banner" placeholder="Görsel seçiniz...">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Fotoğraf</label>
                                                    <div class="mb-4">
                                                        @if($page_data->about_photo=="")
                                                        <span class="text-danger">Fotoğraf bulunamadı.</span>
                                                        @else
                                                            <img src="{{ asset('uploads/'.$page_data->about_photo) }}" alt="" class="profile-photo w_200">
                                                            <a href="{{ route('admin_page_about_photo_delete'); }}" class="btn btn-sm btn-default" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i> Fotoğrafı Kaldırın</a>
                                                        @endif
                                                    </div>

                                                    <label class="form-label">Fotoğrafı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="about_photo" placeholder="Görsel seçiniz...">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Açıklama</label>
                                                    <textarea class="form-control editor" name="about_description">{{ $page_data->about_description }}</textarea>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">SEO Başlığı</label>
                                                    <input type="text" class="form-control" name="about_seo_title" value="{{ $page_data->about_seo_title }}">
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">SEO Meta Özeti</label>
                                                    <input type="text" class="form-control" name="about_seo_meta_description" value="{{ $page_data->about_seo_meta_description }}">
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
