@extends('layouts.main')

@section('title', '| Produk')

@section('content')
    <div class="text">
        PRODUK
    </div>
    <div class="card m-4 mt-0">
        <div class="card-header p-0">
            <h3 class="primary-text primary-bg text-cont p-2 m-0 border">Daftar Produk</h3>
        </div>
        <div class="card-body">
            <table id="tableProduk" class="table table-striped table-hover table-bordered">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 35%;">
                    <col style="width: 20%;">
                    <col style="width: 25%;">
                    <col style="width: 10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Penyedia Produk</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                @foreach ($products as $product)
                    <tr>
                        <td><a href="/produk/{{ $product->productCode }}">{{ $product->productCode }}</a></td>
                        <td><a href="/produk/{{ $product->productCode }}">{{ $product->productName }}</a></td>
                        <td><a href="/produk/{{ $product->productCode }}">{{ $product->productLine }}</a></td>
                        <td><a href="/produk/{{ $product->productCode }}">{{ $product->productVendor }}</a></td>
                        <td><a href="/produk/{{ $product->productCode }}">{{ $product->quantityInStock }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer p-0">
            <p class="primary-text primary-bg text-cont p-2 mb-0 border"></p>
        </div>
    </div>
@endsection
