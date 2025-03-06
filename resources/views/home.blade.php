@extends('layouts.app')

@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
    <div class="row">
        <div class="col-6 mt-4">
            <div class="card h-100">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('employee.index') }}"><h3 class="card-title">Employees</h3></a>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
        <div class="col-6 mt-4">
            <div class="card h-100">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('karakter.index') }}"><h3 class="card-title">Karakter</h3></a>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
@endsection