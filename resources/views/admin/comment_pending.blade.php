@extends('admin.layout.app')

@section('heading', 'Onay Bekleyen Yorumlar')

@section('rightside_button')
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
                                                    <th>Gönderi</th>
                                                    <th>Yazan</th>
                                                    <th>E-Posta</th>
                                                    <th>Yorum</th>
                                                    <th class="text-center">Eylemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pending_comments as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><a href="{{ route('post_detail',$item->rCommentPost->slug); }}" target="_blank" title="Yazıya git">{{ $item->rCommentPost->title }}</a></td>
                                                    <td>{{ $item->person_name }}
                                                        @if($item->person_type==1)
                                                        <span class="badge bg-danger">Admin</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->person_email }}</td>
                                                    <td>{{ $item->person_comment }}</td>
                                                    <td class="pt_10 pb_10 text-center text-nowrap">
                                                        <a href="{{ route('admin_comment_approve', $item->id) }}" class="btn btn-primary"><i class="fas fa-check"></i> Onayla</a>
                                                        <a href="{{ route('admin_comment_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i> Sil</a>
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
                            {{ $pending_comments->links() }}
                        </div>
                    </div>
                </div>

@endsection
