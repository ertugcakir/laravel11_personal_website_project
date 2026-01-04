@extends('admin.layout.app')

@section('heading', 'Servis Ekleme Formu')

@section('rightside_button')
<a href="{{ route('admin_service_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')


                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_service_submit'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mb-4">
                                                    <label class="form-label">Photo</label>
                                                    <input type="file" class="form-control mt_10" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Banner</label>
                                                    <input type="file" class="form-control mt_10" name="banner">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="name" onchange="permalink(this.value)">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Slug (SEF Link)*</label>
                                                    <input type="text" class="form-control" name="slug" id="slug" >
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Short Description*</label>
                                                    <textarea class="form-control h_100" name="short_description"  cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control editor" name="description" cols="30" rows="10"></textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Icon</label>
                                                    <input type="text" class="form-control" name="icon">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Seo Title</label>
                                                    <input type="text" class="form-control" name="seo_title">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Seo Meta Description</label>
                                                    <input type="text" class="form-control" name="seo_meta_description">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Item Order</label>
                                                    <input type="text" class="form-control" name="item_order">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
