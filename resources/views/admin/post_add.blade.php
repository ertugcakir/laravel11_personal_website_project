@extends('admin.layout.app')

@section('heading', 'Blog Yazısı Ekleme Formu')

@section('rightside_button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')


                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_post_submit'); }}" method="post" enctype="multipart/form-data">
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
                                                    <label class="form-label">Başlık*</label>
                                                    <input type="text" class="form-control" name="title" onchange="permalink(this.value)" value="{{ old('title') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Slug (SEF Link)*</label>
                                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Category*</label>
                                                    <select class="form-control  select2" name="post_category_id" >
                                                        @foreach($category_data as $item)
                                                            <option value="{{ $item->id }}" @if(old('post_category_id')==$item->id) selected @endif>{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Short Description*</label>
                                                    <textarea class="form-control h_100" name="short_description" cols="30" rows="10">{{ old('short_description') }}</textarea>
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Description*</label>
                                                    <textarea class="form-control editor" name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Show Comment</label>
                                                    <select name="show_comment" class="form-control">
                                                        <option value="1">Show</option>
                                                        <option value="0">Hide</option>
                                                    </select>
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Seo Title</label>
                                                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Seo Meta Description</label>
                                                    <input type="text" class="form-control" name="seo_meta_description" value="{{ old('seo_meta_description') }}">
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
