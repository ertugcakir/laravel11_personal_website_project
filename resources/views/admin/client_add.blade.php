@extends('admin.layout.app')

@section('heading', 'Müşteri Ekleme Formu')

@section('rightside_button')
<a href="{{ route('admin_client_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_client_submit'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mb-4">
                                                    <label class="form-label">Photo</label>
                                                    <input type="file" class="form-control mt_10" name="photo">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">URL*</label>
                                                    <input type="text" class="form-control" name="url">
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
