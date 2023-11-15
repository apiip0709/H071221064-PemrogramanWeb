@extends('layouts.navbar')

@section('title', 'Produk')

@section('content')
    <div class="container my-5">
        <div class="card mt-4 mb-4">
            <div class="card-header bg-info text-light">
                DATA PRODUK
            </div>
            <div class="card-body bg-light">
                <a href="{{ url('/produk/create') }}" class="btn btn-success btn-sm mb-3" title="Tambah Produk">
                    Tambah Produk
                </a>
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori Produk</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($produks as $data)
                        <tr>
                            <td>{{ $data->kodeProduk }}</td>
                            <td>{{ $data->namaProduk }}</td>
                            <td> {{ $data->kategori }} </td>

                            <td>
                                <a href="{{ url('/produk/' . $data->kodeProduk) }}" title="View Produk"><button class="btn btn-info btn-sm"><i class="fa fa-eye"aria-hidden="true"></i> View</button></a>
                                <a href="{{ url('/produk/' . $data->kodeProduk . '/edit') }}" title="Edit Produk"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"aria-hidden="true"></i> Edit</button></a>

                                <form action="{{ route('produk.destroy', $data->kodeProduk) }}" method="post" accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Produk" onclick="return confirm('Yakin ingin Menghapus?')"><i class="fa-solid fa-trash" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
