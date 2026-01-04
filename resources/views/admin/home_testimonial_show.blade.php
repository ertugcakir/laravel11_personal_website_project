@extends('admin.layout.app')

@section('heading', 'Referans Bölümü Ayarları')

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_home_testimonial_update'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="testimonial_subtitle" value="{{ $page_data->testimonial_subtitle }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="testimonial_title" value="{{ $page_data->testimonial_title }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Arkaplan</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$page_data->testimonial_background) }}" alt="" class="profile-photo w_200">
                                                    </div>

                                                    <label class="form-label">Arkaplanı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="testimonial_background" placeholder="Görsel seçiniz...">
                                                </div>


                                                <div class="mb-4">
                                                    <label class="form-label">Status</label>
                                                    <select name="testimonial_status" class="form-control">
                                                        <option value="1" @if($page_data->testimonial_status==1) selected @endif>Show</option>
                                                        <option value="0" @if($page_data->testimonial_status==0) selected @endif>Hide</option>
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
