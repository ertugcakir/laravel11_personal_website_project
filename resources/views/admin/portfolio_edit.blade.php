@extends('admin.layout.app')

@section('heading', 'Portfolyo Düzenleme Formu')

@section('rightside_button')
<a href="{{ route('admin_portfolio_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_portfolio_update',$row_data->id); }}" method="post" enctype="multipart/form-data">
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
                                                    <label class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="name" onchange="permalink(this.value)" value="{{ $row_data->name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Slug (SEF Link)*</label>
                                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $row_data->slug }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Category*</label>
                                                    <select class="form-control select2" name="portfolio_category_id" >
                                                        @foreach($category_data as $item)
                                                            <option value="{{ $item->id }}"
                                                            @if($item->id==$row_data->portfolio_category_id)
                                                            selected
                                                            @endif
                                                            >{{ $item->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control editor" name="description">{{ $row_data->description }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Project Client Name</label>
                                                    <input type="text" class="form-control" name="project_client" value="{{ $row_data->project_client }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Project Company</label>
                                                    <input type="text" class="form-control" name="project_company" value="{{ $row_data->project_company }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Project Start Date</label>
                                                    <input type="text" class="form-control" name="project_start_date" value="{{ $row_data->project_start_date }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Project End Date</label>
                                                    <input type="text" class="form-control" name="project_end_date" value="{{ $row_data->project_end_date }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Project Cost</label>
                                                    <input type="text" class="form-control" name="project_cost" value="{{ $row_data->project_cost }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Project Website</label>
                                                    <input type="text" class="form-control" name="project_website" value="{{ $row_data->project_website }}">
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
