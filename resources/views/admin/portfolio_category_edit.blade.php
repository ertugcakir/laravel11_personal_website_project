@extends('admin.layout.app')

@section('heading', 'Portfolyo Kategori Düzenleme Formu')

@section('rightside_button')
<a href="{{ route('admin_portfolio_category_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_portfolio_category_update',$row_data->id); }}" method="post">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Category Name*</label>
                                                    <input type="text" class="form-control" name="category_name" value="{{ $row_data->category_name }}">
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
