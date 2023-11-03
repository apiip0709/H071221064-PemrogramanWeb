@extends('layouts.main')

@section('title', '| Karyawan')

@section('content')
    <div class="text">
        KARYAWAN
    </div>
    <div class="card m-4 mt-1">
        <div class="card-header p-0">
            <h3 class="primary-text primary-bg text-cont p-2 m-0 border rounded-top">Daftar Karyawan</h3>
        </div>
        <div class="card-body">
            <table id="tableKaryawan" class="table table-striped table-hover table-bordered">
                <colgroup>
                    <col style="width: 5%;">
                    <col style="width: 25%;">
                    <col style="width: 30%;">
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                </colgroup>
                <thead>
                    <tr>
                        <th>no. Karyawan</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Kantor (kota)</th>
                    </tr>
                </thead>
                @foreach ($employees as $employee)
                    <tr>
                        <td> {{ $employee->employeeNumber }} </td>
                        <td> {{ $employee->full_name }} </td>
                        <td> {{ $employee->email }} </td>
                        <td> {{ $employee->jobTitle }} </td>
                        <td> {{ $employee->cityByOfficeCode->city }} </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer p-0">
            <p class="primary-text primary-bg text-cont p-2 m-0 border rounded-bottom"></p>
        </div>
    </div>
@endsection
