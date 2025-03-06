@extends('layouts.app')
@push('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        Cek Persen Karakter
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="nav-icon fas fa-boxes"></i> Karakter</li>
                            <li class="breadcrumb-item active"><i class="nav-icon fas fa-edit"></i> Cek Karakter</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <form class="form-horizontal"
                        action="{{ route('karakter.cekPersenKarakter') }}"
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="input_1" class="col-sm-2 col-form-label">Inputan 1<span
                                    class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="input_1" id="input_1" class="form-control"
                                    placeholder="Input 1" value="{{ old('input_1') }}">
                                @error('input_1')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input_2" class="col-sm-2 col-form-label">Inputan 2<span
                                    class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="input_2" id="input_2" class="form-control"
                                    placeholder="Input 2" value="{{ old('input_2') }}">
                                @error('input_2')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="float-right">
                            <button type="submit" id="save" class="btn btn-primary">Cek Persen Karakter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Summernote -->
    <script src="{{ asset('back/adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('back/adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush