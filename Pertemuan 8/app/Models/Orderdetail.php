<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orderdetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function totalPenjualan()
    {
        $total = self::sum(DB::raw('quantityOrdered * priceEach'));

        $total = number_format($total, 2);

        $total = str_replace(' ', '.', str_replace('.', ',', str_replace(',', ' ', $total)));

        return '$' . $total;
    }
}
