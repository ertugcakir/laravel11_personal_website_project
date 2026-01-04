@extends('admin.layout.app')

@section('heading', 'Sayaç Bölümü Ayarları')

@section('main_content')

                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_home_counter_update'); }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Counter1 Number</label>
                                                    <input type="number" class="form-control" name="counter1_number" value="{{ $page_data->counter1_number }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter1 Name</label>
                                                    <input type="text" class="form-control" name="counter1_name" value="{{ $page_data->counter1_name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter2 Number</label>
                                                    <input type="number" class="form-control" name="counter2_number" value="{{ $page_data->counter2_number }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter2 Name</label>
                                                    <input type="text" class="form-control" name="counter2_name" value="{{ $page_data->counter2_name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter3 Number</label>
                                                    <input type="number" class="form-control" name="counter3_number" value="{{ $page_data->counter3_number }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter3 Name</label>
                                                    <input type="text" class="form-control" name="counter3_name" value="{{ $page_data->counter3_name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter4 Number</label>
                                                    <input type="number" class="form-control" name="counter4_number" value="{{ $page_data->counter4_number }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Counter4 Name</label>
                                                    <input type="text" class="form-control" name="counter4_name" value="{{ $page_data->counter4_name }}">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Mevcut Arkaplan</label>
                                                    <div class="mb-4">
                                                        <img src="{{ asset('uploads/'.$page_data->counter_background) }}" alt="" class="profile-photo w_200">
                                                    </div>

                                                    <label class="form-label">Arkaplanı Değiştirin </label>
                                                    <input type="file" class="form-control mt_10" name="counter_background" placeholder="Görsel seçiniz...">
                                                </div>

                                                <div class="mb-4">
                                                    <label class="form-label">Status</label>
                                                    <select name="counter_status" class="form-control">
                                                        <option value="1" @if($page_data->counter_status==1) selected @endif>Show</option>
                                                        <option value="0" @if($page_data->counter_status==0) selected @endif>Hide</option>
                                                    </select>
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
