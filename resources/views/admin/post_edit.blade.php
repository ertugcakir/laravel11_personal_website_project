@extends('admin.layout.app')

@section('heading', 'Blog Yazısı Düzenleme Formu')

@section('rightside_button')
<a href="{{ route('admin_post_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')


                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_post_update',$row_data->id); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mb-4">
                                                    <label class="form-label">Photo</label>
                                                        <div class="mb-4">
                                                            <img src="{{ asset('uploads/'.$row_data->photo) }}" alt="" class="profile-photo w_200">
                                                        </div>
                                                    <input type="file" class="form-control mt_10" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Banner</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$row_data->banner) }}" alt="" class="profile-photo w_200">
                                                    </div>
                                                    <input type="file" class="form-control mt_10" name="banner">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Başlık*</label>
                                                    <input type="text" class="form-control" name="title" onchange="permalink(this.value)" value="{{ $row_data->title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Slug (SEF Link)*</label>
                                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $row_data->slug }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Category*</label>
                                                    <select class="form-control  select2" name="post_category_id" >
                                                        @foreach($category_data as $item)
                                                            <option value="{{ $item->id }}" @if($item->id==$row_data->portfolio_category_id) selected @endif>{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Short Description*</label>
                                                    <textarea class="form-control h_100" name="short_description" cols="30" rows="10">{{ $row_data->short_description }}</textarea>
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Description*</label>
                                                    <textarea class="form-control editor" name="description" cols="30" rows="10">{{ $row_data->description }}</textarea>
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Show Comment</label>
                                                    <select name="show_comment" class="form-control">
                                                        <option value="1"  @if(1==$row_data->show_comment) selected @endif>Show</option>
                                                        <option value="0"  @if(0==$row_data->show_comment) selected @endif>Hide</option>
                                                    </select>
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Seo Title</label>
                                                    <input type="text" class="form-control" name="seo_title" value="{{ $row_data->seo_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Seo Meta Description</label>
                                                    <input type="text" class="form-control" name="seo_meta_description" value="{{ $row_data->seo_meta_description }}">
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
