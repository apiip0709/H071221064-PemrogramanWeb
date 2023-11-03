@extends('layouts.main')

@section('content')
    <div class="text">
        DASHBOARD
    </div>
    <div class="container-fluid px-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ \App\Models\Product::totalProduct() }}</h3>
                        <p class="fs-5">Total Produk</p>
                    </div>
                    <i class='bx bx-package fs-1 primary-text border rounded-full primary-bg p-3'></i>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ \App\Models\Orderdetail::totalPenjualan() }}</h3>
                        <p class="fs-5">Total Penjualan</p>
                    </div>
                    <i class='bx bx-cart fs-1 primary-text border rounded-full primary-bg p-3'></i>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{ \App\Models\Order::totalPengiriman() }}</h3>
                        <p class="fs-5">Total Pengiriman</p>
                    </div>
                    <i class='bx bxs-truck fs-1 primary-text border rounded-full primary-bg p-3'></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    <img src="/assets/img/k-produk.jpg" class="card-img-top" alt="k-produk">
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/assets/img/p-penjualan.jpg" class="card-img-top" alt="p-penjualan">
                </div>
            </div>
        </div>
    </div>
@endsection
