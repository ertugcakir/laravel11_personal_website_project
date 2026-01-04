@extends('admin.layout.app')

@section('heading', 'Eğitim Programı Ekleme Formu')

@section('rightside_button')
<a href="{{ route('admin_education_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_education_submit'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Program*</label>
                                                    <input type="text" class="form-control" name="program">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">University*</label>
                                                    <input type="text" class="form-control" name="university">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Order</label>
                                                    <input type="text" class="form-control" name="item_order">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Date</label>
                                                    <input type="text" class="form-control" name="date">
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
