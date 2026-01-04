@extends('admin.layout.app')

@section('heading', 'Blog Kategori Düzenleme Formu')

@section('rightside_button')
<a href="{{ route('admin_post_category_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_post_category_update',$row_data->id); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mb-4">
                                                    <label class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="category_name" onchange="permalink(this.value)" value="{{ $row_data->category_name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Slug (SEF Link)*</label>
                                                    <input type="text" class="form-control" name="category_slug" id="slug" value="{{ $row_data->category_slug }}">
                                                </div>

                                                <div class="mb-4" style="border:solid 1px #ccc; border-radius:10px; padding:10px;">
                                                    <label class="form-label">Kategori Arkaplan</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$row_data->category_banner) }}" alt="" class="profile-photo w_200">
                                                    </div>

                                                    <label class="form-label">Kategori Arkaplanını Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="category_banner" placeholder="Görsel seçiniz...">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Seo Title</label>
                                                    <input type="text" class="form-control" name="category_seo_title" value="{{ $row_data->category_seo_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Seo Meta Description</label>
                                                    <input type="text" class="form-control" name="category_seo_meta_description" value="{{ $row_data->category_seo_meta_description }}">
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
