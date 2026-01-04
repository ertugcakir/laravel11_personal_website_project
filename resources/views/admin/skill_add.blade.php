@extends('admin.layout.app')

@section('heading', 'Yetenek Ekleme Formu')

@section('rightside_button')
<a href="{{ route('admin_skill_show') }}" class="btn btn-primary text-nowrap"><i class="fas fa-list"></i> Tümünü Görüntüle</a>
@endsection

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_skill_submit'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Name*</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Percentage*</label>
                                                    <input type="text" class="form-control" name="percentage">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Select Side</label>
                                                    <select name="side" class="form-control">
                                                        <option value="Left">Left</option>
                                                        <option value="Right">Right</option>
                                                    </select>

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
