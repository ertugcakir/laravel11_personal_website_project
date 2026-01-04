@extends('admin.layout.app')

@section('heading', 'Nitelik Bölümü Ayarları')

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_home_qualification_update'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Subtitle</label>
                                                    <input type="text" class="form-control" name="qualification_subtitle" value="{{ $page_data->qualification_subtitle }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="qualification_title" value="{{ $page_data->qualification_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Status</label>
                                                    <select name="qualification_status" class="form-control">
                                                        <option value="1" @if($page_data->qualification_status==1) selected @endif>Show</option>
                                                        <option value="0" @if($page_data->qualification_status==0) selected @endif>Hide</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Education Title</label>
                                                    <input type="text" class="form-control" name="education_title" value="{{ $page_data->education_title }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Experience Title</label>
                                                    <input type="text" class="form-control" name="experience_title" value="{{ $page_data->experience_title }}">
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
