<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fullName()
    {
        return $this->attributes['firstName'] . ' ' . $this->attributes['lastName'];
    }

    public function cityByOfficeCode()
    {
        // Definisikan relasi antara tabel employees dan offices
        return $this->belongsTo(Office::class, 'officeCode', 'officeCode');
    }
}
