@extends('admin.layouts.main', ['title' => 'Managejobpost'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/jobpost">Job Post Management</a></li>
                        <li class="breadcrumb-item active">Manage Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Posisi</th>
                                        <th>Perusahaan</th>
                                        <th>Lokasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item['jobpost']->posisi }}</td>
                                                <td>{{ $item['perusahaan']->namaCompany }}</td>
                                                <td>{{ $item['jobpost']->lokasi }}</td>
                                                <td style="width: 250px">
                                                    <a href="/admin/jobpost/{{ $item['jobpost']->id }}"
                                                        title="View Produk"><button class="btn btn-info btn-sm"><i
                                                                class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                    <a href="/admin/jobpost/{{ $item['jobpost']->id }}/edit"
                                                        title="Edit Produk"><button class="btn btn-primary btn-sm"><i
                                                                class="fa fa-edit"aria-hidden="true"></i> Edit</button></a>

                                                    <form action="/admin/jobpost/{{ $item['jobpost']->id }}" method="post"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Produk"
                                                            onclick="return confirm('Yakin ingin Menghapus?')"><i
                                                                class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
