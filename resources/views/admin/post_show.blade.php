@extends('admin.layout.app')

@section('heading', 'Blog Yazıları Yönetimi')

@section('rightside_button')
<a href="{{ route('admin_post_add') }}" class="btn btn-primary text-nowrap"><i class="fas fa-plus"></i> Ekle</a>
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
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><img src="{{ asset('uploads/'.$item->photo) }}" alt="" class="w_100" ></td>
                                                    <td><img src="{{ asset('uploads/'.$item->banner) }}" alt="" class="w_200" ></td>
                                                    <td>{{ $item->title }}</td>
                                                    <td>{{ $item->rPostCategory->category_name }}</td>
                                                    <td class="pt_10 pb_10 text-center">
                                                        <a href="{{ route('admin_post_edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_post_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
                    <div class="row">
                        <div class="col-md-12">
                            {{ $all_data->links() }}
                        </div>
                    </div>

                </div>

@endsection
