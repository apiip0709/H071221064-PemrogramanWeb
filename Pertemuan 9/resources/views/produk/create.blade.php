@extends('layouts.navbar')

@section('title', 'Tambah Produk')

@section('content')
    <div class="container mt-3">
        <a href="{{ url('/produk') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Produk"><i class="fa-solid fa-arrow-left"></i> Back</a>

        <div class="card">
            <div class="card-header bg-info text-light">
                Input Produk Baru
            </div>
            <div class="card-body bg-light">
                <form action=" {{ url('produk') }} " method="post">
                    {!! csrf_field() !!}

                    <div class="d-flex justify-content-between m-3">
                        <div class="form-group flex-grow-1">
                            <label for="kategori">Kategori Produk</label>
                            <select name="kategori" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($kategori as $data)
                                    <option value="{{ $data->kategoriProduk }}">{{ $data->kategoriProduk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group flex-grow-2 mx-5">
                            <label for="kode">Kode Produk</label>
                            <input type="text" name="kode" id="kode" class="form-control"
                                value="{{ $kodeProduk }}" readonly>
                        </div>
                    </div>

                    <div class="form-group m-3">
                        <label for="nama">Nama Produk</label>
                        <input type="text" name="nama" id="nama" class="form-control" required
                            autocomplete="off">
                    </div>

                    <div class="d-flex justify-content-between mx-5 my-3 g-5">
                        <div class="form-group flex-grow-1 mx-5">
                            <label for="stok">Stok Produk</label>
                            <input type="number" name="stok" id="stok" class="form-control" required
                                autocomplete="off">
                        </div>

                        <div class="form-group flex-grow-1 mx-5">
                            <label for="harga">Harga Produk</label>
                            <input type="number" name="harga" id="harga" class="form-control" required
                                autocomplete="off">
                        </div>
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
