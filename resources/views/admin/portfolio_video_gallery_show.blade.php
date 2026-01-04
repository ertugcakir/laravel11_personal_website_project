@extends('admin.layout.app')

@section('heading', 'Portfolyo Video Galeri > '.$single_portfolio->name.' (ID: '.$single_portfolio->id.')')

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
                                                    <th>Video Önizleme</th>
                                                    <th>Caption</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($video_gallery_items as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <div class="video-iframe-container">
                                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->caption }}</td>
                                                    <td class="pt_10 pb_10 text-center">
                                                        <a href="{{ route('admin_portfolio_video_gallery_delete', $item->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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
                                    <form action="{{ route('admin_portfolio_video_gallery_submit',$single_portfolio->id); }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Caption*</label>
                                                    <input type="text" class="form-control" name="caption" value="{{ old('caption') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Video ID*</label>
                                                    <input type="text" class="form-control" name="video_id" value="{{ old('video_id') }}">
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
