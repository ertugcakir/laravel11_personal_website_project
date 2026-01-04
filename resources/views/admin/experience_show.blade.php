@extends('admin.layout.app')

@section('heading', 'Deneyim Yönetimi')

@section('rightside_button')
<a href="{{ route('admin_experience_add') }}" class="btn btn-primary text-nowrap"><i class="fas fa-plus"></i> Ekle</a>
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
                                                    <th>Order</th>
                                                    <th>Company</th>
                                                    <th>Designation</th>
                                                    <th>Date</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($all_data as $item)
                                                <tr>
                                                    <td>{{ $item->item_order }}</td>
                                                    <td>{{ $item->company }}</td>
                                                    <td>{{ $item->designation }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td class="pt_10 pb_10 text-center">
                                                        <a href="{{ route('admin_experience_edit', $item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_experience_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
