@extends('admin.layout.app')

@section('heading', 'Deneyim Düzenleme Formu')

@section('rightside_button')
<a href="{{ route('admin_experience_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_experience_update',$row_data->id); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Company*</label>
                                                    <input type="text" class="form-control" name="company" value="{{ $row_data->company }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Designation*</label>
                                                    <input type="text" class="form-control" name="designation" value="{{ $row_data->designation }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Order</label>
                                                    <input type="number" class="form-control" name="item_order" value="{{ $row_data->item_order }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Date</label>
                                                    <input type="text" class="form-control" name="date" value="{{ $row_data->date }}">
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
