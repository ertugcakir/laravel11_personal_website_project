@extends('admin.layout.app')

@section('heading', 'Referans Düzenleme Formu')

@section('rightside_button')
<a href="{{ route('admin_testimonial_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_testimonial_update',$row_data->id); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Fotoğraf</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$row_data->photo) }}" alt="" class="profile-photo w_200">
                                                    </div>

                                                    <label class="form-label">Fotoğrafı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="photo" value="{{ $row_data->photo }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $row_data->name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Designation*</label>
                                                    <input type="text" class="form-control" name="designation" value="{{ $row_data->designation }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Comment*</label>
                                                    <textarea class="form-control" name="comment">{{ $row_data->comment }}</textarea>
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
