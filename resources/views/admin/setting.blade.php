@extends('admin.layout.app')

@section('heading', 'Genel Site Ayarları Formu')

@section('rightside_button')
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_setting_update',$setting_data->id); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-4" style="border:solid 1px #ccc; border-radius:10px; padding:10px;">
                                                    <label class="form-label">Logo</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$setting_data->logo) }}" alt="" class="w_100">
                                                    </div>

                                                    <label class="form-label">Site Logosunu Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="logo" accept="image/png, image/jpeg, image/gif" placeholder="Görsel seçiniz...">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Site Üst Başlığı*</label>
                                                    <input type="text" class="form-control" name="header_text" value="{{ $setting_data->header_text }}" placeholder="Logo yerine geçebilecek yazı">
                                                </div>
                                                <div class="mb-4" style="border:solid 1px #ccc; border-radius:10px; padding:10px;">
                                                    <label class="form-label">Favicon</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$setting_data->favicon) }}" alt="">
                                                    </div>

                                                    <label class="form-label">Site İkonunu Değiştirin </label>
                                                    <input type="file" class="form-control" name="favicon" accept="ico">
                                                </div>
                                                <div class="mb-4" style="border:solid 1px #ccc; border-radius:10px; padding:10px;">
                                                    <label class="form-label">Alt Logo</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$setting_data->logo_footer) }}" alt="" class="w_100">
                                                    </div>
                                                    <label class="form-label">Site Alt Logosunu Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="logo_footer" accept="image/png, image/jpeg, image/gif" placeholder="Görsel seçiniz...">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Site Alt Yazısı</label>
                                                    <input type="text" class="form-control" name="footer_text" value="{{ $setting_data->footer_text }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Copyright &copy; Yazısı</label>
                                                    <input type="text" class="form-control" name="footer_copyright" value="{{ $setting_data->footer_copyright }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 1</label>
                                                    <input type="text" class="form-control" name="footer_icon_1" value="{{ $setting_data->footer_icon_1 }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 1 URL</label>
                                                    <input type="text" class="form-control" name="footer_icon_1_url" value="{{ $setting_data->footer_icon_1_url }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 2</label>
                                                    <input type="text" class="form-control" name="footer_icon_2" value="{{ $setting_data->footer_icon_2 }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 2 URL</label>
                                                    <input type="text" class="form-control" name="footer_icon_2_url" value="{{ $setting_data->footer_icon_1_url }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 3</label>
                                                    <input type="text" class="form-control" name="footer_icon_3" value="{{ $setting_data->footer_icon_3 }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 3 URL</label>
                                                    <input type="text" class="form-control" name="footer_icon_3_url" value="{{ $setting_data->footer_icon_3_url }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 4</label>
                                                    <input type="text" class="form-control" name="footer_icon_4" value="{{ $setting_data->footer_icon_4 }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Footer Sosyal Icon 4 URL</label>
                                                    <input type="text" class="form-control" name="footer_icon_4_url" value="{{ $setting_data->footer_icon_4_url }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Tema Rengi</label>
                                                    <input type="text" class="form-control" name="theme_color" value="{{ $setting_data->theme_color }}" data-jscolor="{}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Preloader Durumu</label>
                                                    <select name="preloader_status" class="form-control">
                                                        <option value="0" @if($setting_data->preloader_status==0) selected @endif>Pasif</option>
                                                        <option value="1" @if($setting_data->preloader_status==1) selected @endif>Aktif</option>
                                                    </select>

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
