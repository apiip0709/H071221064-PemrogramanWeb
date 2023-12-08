@extends('penyedia.layouts.main', ['title' => 'PenyediaDashboard'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile {{ $user->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                        <li class="breadcrumb-item active">Profile Management</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if ($perusahaan)
        <a href="/penyedia/company/{{ $perusahaan->id }}/edit" class="btn btn-secondary mx-3">Edit Perusahaan</a>
    @else
        <a href="/penyedia/company/create" class="btn btn-secondary mx-3">Add Perusahaan</a>
    @endif

    <section class="section setting mt-3">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body pt-3">
                    <div class="tab-pane fade show profile-apply" id="profile-apply">
                        <div class="card mt-2">
                            @if (session()->has('message'))
                                <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
                                    {{ session('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card-header">
                                <h1 class="card-title">Pelamar pekerjaan</h1>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Posisi</th>
                                            <th>Nama Pelamar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($applyData as $data)
                                        <tbody>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $data['posisi'] }}</td>
                                            <td>{{ $data['nama'] }}</td>
                                            <td>{{ $data['status'] }}</td>
                                            <td>
                                                <a href="/jobs/{{ $data['id_jobpost'] }}/apply/{{ $data['id_apply'] }}/edit"
                                                    title="Edit Produk"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-edit"aria-hidden="true"></i> View</button></a>
                                            </td>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
