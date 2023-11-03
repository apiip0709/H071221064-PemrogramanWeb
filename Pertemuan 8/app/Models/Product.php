<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function totalProduct()
    {
        $total = self::sum('quantityInStock');

        $total = number_format($total);

        $total = str_replace(',','.', $total);

        return $total;
    }
}
