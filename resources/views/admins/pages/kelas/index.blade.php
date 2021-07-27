@extends('admins.layouts.header')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Data Kelas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active">Data Kelas</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <div class="card-title">
                    <div class="btn-group">
                        <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-md"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if($message = Session::get('success'))
                    <div class="alert alert-success"><strong><i class="fa fa-check-circle"></i> {{ $message }}</strong></div>
                @elseif($message = Session::get('error'))
                    <div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> {{ $message }}</strong></div>
                @endif
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('kelas.edit', $value->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('kelas.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection
