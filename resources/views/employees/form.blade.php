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
                        @if ($model->exists)
                            <i class="nav-icon fas fa-eidt"></i> Edit Employee
                        @else
                            <i class="nav-icon fas fa-plus"></i> Tambah Employee
                        @endif
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="nav-icon fas fa-boxes"></i> Employee</li>
                        @if ($model->exists)
                            <li class="breadcrumb-item active"><i class="nav-icon fas fa-edit"></i> Edit Employee
                                </li>
                        @else
                            <li class="breadcrumb-item active"><i class="nav-icon fas fa-plus"></i> Tambah Employee
                            </li>
                        @endif
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
                        action="{{ $model->exists ? route('employee.update', base64_encode($model->id)) : route('employee.store') }}"
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($model->exists)
                            <input type="hidden" name="_method" value="PUT">
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name<span
                                    class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Name" value="{{ $model->exists ? $model->person->name : old('name') }}">
                                @error('name')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email<span
                                class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Email" value="{{ $model->exists ? $model->person->email : old('email') }}">
                                @error('email')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone<span
                                class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="Phone" value="{{ $model->exists ? $model->person->phone : old('phone') }}">
                                @error('phone')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-sm-2 col-form-label">Position<span
                                class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="position" id="position" class="form-control"
                                    placeholder="Position" value="{{ $model->exists ? $model->position : old('position') }}">
                                @error('position')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-sm-2 col-form-label">Salary<span
                                class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="salary" id="salary" class="form-control"
                                    placeholder="Salary" value="{{ $model->exists ? $model->salary : old('salary') }}">
                                @error('salary')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">IS Manager ?<span
                                    class="text-red">*</span></label>
                            <div class="col-sm-10">
                                <input type="checkbox" id="is_manager" name="is_manager" class="form-check" {{ $model->exists && isset($model->manager) ? 'checked' : '' }}>
                                @error('is_manager')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row bonus">
                            <label for="bonus" class="col-sm-2 col-form-label">Bonus<span
                                class="text-red"></span></label>
                            <div class="col-sm-10">
                                <input type="text" name="bonus" id="bonus" class="form-control"
                                    placeholder="Bonus" value="{{ $model->exists && isset($model->manager) ? $model->manager->bonus : old('bonus') }}">
                                @error('bonus')
                                    <small class="text-red">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                @enderror
                            </div>
                        </div>                   
                        <div class="float-right">
                            <button type="submit" id="save" class="btn btn-primary">Save</button>
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

    <script>
        function deleteGambar(btn, norow) {
            var row = btn.parentNode;
            row.parentNode.removeChild(row);
        }

        $(function() {
        $('.bonus').hide();
        @if ($model->exists && isset($model->manager))        
            $('.bonus').show();
        @endif

            $("#is_manager").change(function () {
                if ($(this).is(":checked")) {
                    $(".bonus").fadeIn();
                } else {
                    $(".bonus").fadeOut();
                }
            });
        });
    </script>
@endpush
