@extends('layouts.main')

@section('title', '| Kantor')

@section('content')
    <div class="text">
        KANTOR
    </div>
    <div class="card m-4 mt-1">
        <div class="card-header p-0">
            <h3 class="primary-text primary-bg text-cont p-2 m-0 border rounded-top">Daftar Kantor</h3>
        </div>
        <div class="card-body">
            <table id="tableKantor" class="table table-striped table-hover table-bordered">
                <colgroup>
                    <col style="width: 2%;">
                    <col style="width: 15%;">
                    <col style="width: 23%;">
                    <col style="width: 30%;">
                    <col style="width: 15%;">
                    <col style="width: 15%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kota</th>
                        <th>no. Telpon</th>
                        <th>Alamat</th>
                        <th>Negara</th>
                        <th>Kode Pos</th>
                    </tr>
                </thead>
                @foreach ($offices as $office)
                    <tr>
                        <td> {{ $office->officeCode }} </td>
                        <td> {{ $office->city }} </td>
                        <td> {{ $office->phone }} </td>
                        <td> {!! $office->alamat_lengkap !!} </td>
                        <td> {{ $office->country }} </td>
                        <td> {{ $office->postalCode }} </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer p-0">
            <p class="primary-text primary-bg text-cont p-2 m-0 border rounded-bottom"></p>
        </div>
    </div>
@endsection
