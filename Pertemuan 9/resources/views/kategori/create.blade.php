@extends('layouts.navbar')

@section('title', 'Tambah Produk')

@section('content')
    <div class="container mt-3">
        <a href="{{ url('/kategori') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Produk"><i
                class="fa-solid fa-arrow-left"></i> Back</a>

        <div class="card">
            <div class="card-header bg-info text-light">
                Input Kategori Baru
            </div>
            <div class="card-body bg-light">
                <form action=" {{ url('kategori') }} " method="post">
                    {!! csrf_field() !!}

                    <div class="form-group m-3">
                        <label for="kategori">Kategori Produk</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" required
                            autocomplete="off">
                    </div>

                    <div class="form-group m-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" required
                            autocomplete="off">
                    </div>

                    <input type="submit" value="Simpan" class="btn btn-success">
                </form>
            </div>
            <div class="card-footer bg-info"></div>
        </div>

        @if (session('flash_message'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('flash_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error_message'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error_message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
@endsection
