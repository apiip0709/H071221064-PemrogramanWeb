<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function totalPengiriman()
    {
        return self::whereNotNull('shippedDate')->count();
    }
}
