@extends('layouts.main')

@section('title', '| Detail Produk')

@section('content')
    <div class="text">
        DETAIL PRODUK : {{ $products->productName }}
    </div>
    <div class="container-fluid">
        <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/assets/img/'.$products->productLine.'/1.jpg') }}" class="d-block mx-auto" alt="..."
                        style="height: auto; max-height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/img/'.$products->productLine.'/2.jpg') }}" class="d-block mx-auto" alt="..."
                        style="height: auto; max-height: 100%;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/img/'.$products->productLine.'/3.jpg') }}" class="d-block mx-auto" alt="..."
                        style="height: auto; max-height: 100%;">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container box-all mt-4">
        <div class="box-produk">
            <div>
                <h5>Kode Produk     : <span> {{ $products->productCode }} </span></h5>
                <h5>Nama Produk     : <span> {{ $products->productName }} </span></h5>
                <h5>Kategori Produk : <span> {{ $products->productLine }} </span></h5>
                <h5>Penydia produk  : <span> {{ $products->productVendor }} </span></h5>
            </div>
            <div>
                <h5>Skala Produksi  : <span> {{ $products->productScale }} </span></h5>
                <h5>Stok Produk  : <span> {{ $products->quantityInStock }} </span></h5>
                <h5>Harga Satuan : <span> ${{ $products->buyPrice }}</h5>
            </div>
        </div>
        <div class="box-desk">
            <h5>Deskripsi Produk</h5>
            <p> <span> {{ $products->productDescription }} </span> </p>
        </div>
    </div>
@endsection
