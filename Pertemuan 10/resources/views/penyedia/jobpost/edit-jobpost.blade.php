@extends('Penyedia.layouts.main', ['title' => 'EditJobpost'])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="/penyedia/jobpost">
                        <button class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Back</button>
                    </a>
                    <h1>Edit Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                        <li class="breadcrumb-item"><a href="/penyedia/jobpost">Job Post Management</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card card-info mt-2">
            <div class="card-header">
                <h3 class="card-title">Job Post Form</h3>
            </div>
            <div class="card-body">
                <form action="/penyedia/jobpost/{{ $data->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="posisi">Posisi</label>
                            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                name="posisi" placeholder="posisi" value="{{ old('posisi', $data->posisi) }}" required>
                            @error('posisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="company">Perusahaan</label>
                            <select id="company" name="company" class="form-control select2" style="width: 100%;">
                                @foreach ($perusahaan as $item)
                                    <option value="{{ $item->id }}">{{ $item->namaCompany }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="gaji">Gaji</label>
                            <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji"
                                name="gaji" placeholder="gaji" value="{{ old('gaji', $data->gaji) }}" required>
                            @error('gaji')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select id="type" name="type" class="form-control select2" style="width: 100%;">
                                    @if ($data->type == 'part-time')
                                        <option value="part-time">Part Time</option>
                                        <option value="full-time">Full Time</option>
                                    @elseif ($data->type == 'full-time')
                                        <option value="full-time">Full Time</option>
                                        <option value="part-time">Part Time</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <input type="email" class="form-control @error('inputEmail3') is-invalid @enderror"
                            id="inputEmail3" name="inputEmail3" placeholder="Email"
                            value="{{ old('inputEmail3', $data->email) }}" required>
                        @error('inputEmail3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                            name="lokasi" placeholder="ex: Kota, Negara" value="{{ old('lokasi', $data->lokasi) }}"
                            required>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi">Deskripsi</label>
                        {{-- <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" placeholder="Kota, Negara" value="{{ old('deskripsi',$data->deskripsi) }}" required> --}}
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                            placeholder="Kota, Negara" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <button class="btn btn-success" type="submit">Edit Job Post</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-info"></div>
        </div>
        <!-- /.card -->
    </section>
@endsection
