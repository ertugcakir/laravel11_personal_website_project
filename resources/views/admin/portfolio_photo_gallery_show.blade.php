@extends('admin.layout.app')

@section('heading', 'Portfolyo Foto Galeri > '.$single_portfolio->name.' (ID: '.$single_portfolio->id.')')

@section('rightside_button')
<a href="{{ route('admin_portfolio_show') }}" class="btn btn-danger text-nowrap"><i class="fas fa-arrow-left"></i> Geriye dön</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-8">
                            <h5>Tüm Görseller</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Photo</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($photo_gallery_items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_100" ></td>
                                                    <td class="pt_10 pb_10 text-center">
                                                        <a href="{{ route('admin_portfolio_photo_gallery_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <h5>Görsel Ekle</h5>
<div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_portfolio_photo_gallery_submit',$single_portfolio->id); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="mb-4">
                                                    <label class="form-label">Photo</label>
                                                    <input type="file" class="form-control mt_10" name="photo">
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
