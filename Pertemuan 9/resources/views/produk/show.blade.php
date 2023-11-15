@extends('layouts.navbar')

@section('title', 'Tambah Produk')

@section('content')
    <div class="container mt-3">
        <a href="{{ url('/produk') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Produk"><i class="fa-solid fa-arrow-left"></i> Back</a>

        <div class="card">
            <div class="card-header bg-info text-light">Detail Produk {{ $produks->kodeProduk }} </div>
            <div class="card-body bg-light">
                <table>
                    <tr>
                        <td><h5>Nama Produk</h5></td>
                        <td><h5>: {{ $produks->namaProduk }} </h5></td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">Kategori Produk</span></td>
                        <td>:<span class="label label-default"> {{ $produks->kategori }} </span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">Stok Produk</span></td>
                        <td>:<span class="label label-default"> {{ $produks->stok }} </span></td>
                    </tr>
                    <tr>
                        <td><span class="label label-default">Harga Produk</span></td>
                        <td>:<span class="label label-default"> Rp. {{ $produks->harga }} </span></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer bg-info"></div>
        </div>
    </div>
@endsection
