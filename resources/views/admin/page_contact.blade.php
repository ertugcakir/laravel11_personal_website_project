@extends('admin.layout.app')

@section('heading', 'İletişim Sayfası İçeriği Düzenleme Paneli')

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_page_contact_update'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">İletişim Sayfası Başlığı</label>
                                                    <input type="text" class="form-control" name="contact_heading" value="{{ $page_data->contact_heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Banner</label>
                                                    <div class="mb-4">
                                                        @if($page_data->contact_banner=="")
                                                        <span class="text-danger">Banner bulunamadı.</span>
                                                        @else
                                                            <img src="{{ asset('uploads/'.$page_data->contact_banner) }}" alt="" class="profile-photo w_200">
                                                        @endif
                                                     </div>

                                                    <label class="form-label">Bannerı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="contact_banner" placeholder="Görsel seçiniz...">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Adres</label>
                                                    <textarea name="contact_address" class="form-control h_100">{{ $page_data->contact_address }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">E-Posta</label>
                                                    <textarea name="contact_email" class="form-control h_100">{{ $page_data->contact_email }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Telefon</label>
                                                    <textarea name="contact_phone" class="form-control h_100">{{ $page_data->contact_phone }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Harita URL Adresi (Iframe için)</label>
                                                    <input type="text" class="form-control" name="contact_map_iframe" value="{{ $page_data->contact_map_iframe }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">SEO Başlığı</label>
                                                    <input type="text" class="form-control" name="contact_seo_title" value="{{ $page_data->contact_seo_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">SEO Meta Özeti</label>
                                                    <input type="text" class="form-control" name="contact_seo_meta_description" value="{{ $page_data->contact_seo_meta_description }}">
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
