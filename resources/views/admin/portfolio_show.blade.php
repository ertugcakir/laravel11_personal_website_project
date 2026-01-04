@extends('admin.layout.app')

@section('heading', 'Portfolyo Yönetimi')

@section('rightside_button')
<a href="{{ route('admin_portfolio_add') }}" class="btn btn-primary text-nowrap"><i class="fas fa-plus"></i> Ekle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Photo</th>
                                                    <th>Banner</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Gallery</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_100" ></td>
                                                    <td><img src="{{ asset('uploads/'.$item->banner) }}" alt="" class="w_200" ></td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->rPortfolioCategory->category_name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin_portfolio_photo_gallery', $item->id) }}" class="btn btn-success btn-sm w-100-p mb_10">Photo Gallery</a>
                                                        <a href="{{ route('admin_portfolio_video_gallery', $item->id) }}" class="btn btn-success btn-sm w-100-p">Video Gallery</a>
                                                    </td>
                                                    <td class="pt_10 pb_10 text-center">
                                                        <a href="{{ route('admin_portfolio_edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_portfolio_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
