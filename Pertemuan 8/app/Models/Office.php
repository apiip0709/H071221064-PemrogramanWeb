<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    public function alamatLengkap()
    {
        $address1 = $this->attributes['addressLine1'];
        $address2 = $this->attributes['addressLine2'];

        // Periksa jika $address1 dan $address2 tidak null
        if ($address1 !== null && $address2 !== null) {
            return nl2br("1) $address1,\n2) $address2");
        } elseif ($address1 !== null) {
            return nl2br("1) $address1");
        } elseif ($address2 !== null) {
            return nl2br("2) $address2");
        } else {
            return nl2br("Alamat tidak tersedia");
        }
    }
}
