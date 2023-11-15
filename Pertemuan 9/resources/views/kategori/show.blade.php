@extends('layouts.navbar')

@section('title', 'Tambah Produk')

@section('content')
    <div class="container mt-3">
        <a href="{{ url('/kategori') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Produk"><i class="fa-solid fa-arrow-left"></i> Back</a>

        <div class="card">
            <div class="card-header bg-info text-light">Detail Kategori</div>
            <div class="card-body bg-light">
                <table>
                    <tr>
                        <td><h5>Kategori Produk</h5></td>
                        <td><h5>{{ $kategoris->kategoriProduk }} </h5></td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">Deskripsi</span></td>
                        <td><span class="label label-default">{{ $kategoris->deskripsi }}</span></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer bg-info"></div>
        </div>
    </div>
@endsection
