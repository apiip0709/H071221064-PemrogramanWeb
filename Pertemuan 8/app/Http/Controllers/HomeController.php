<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Office;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function kantor()
    {
        $offices = Office::all();
        // Iterasi melalui koleksi dan mengambil nilai full_name
        $offices->transform(function ($office) {
            $office->alamat_lengkap = $office->alamatLengkap();
            return $office;
        });

        return view('kantor', compact('offices'));
    }

    public function karyawan()
    {
        $employees = Employee::all();

        // Iterasi melalui koleksi dan mengambil nilai full_name
        $employees->transform(function ($employee) {
            $employee->full_name = $employee->fullName();
            return $employee;
        });

        return view('karyawan', compact('employees'));
    }

    public function produk()
    {
        $products = Product::all();
        return view('produk', compact(['products']));
    }
}
