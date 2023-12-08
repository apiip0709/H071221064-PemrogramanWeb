<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobpost extends Model
{
    use HasFactory;
    protected $fillable = ['posisi', 'lokasi', 'type', 'email', 'deskripsi', 'gaji', 'id_company', 'id_user'];

    public function formatGaji()
    {
        // Menggunakan number_format untuk mengubah format angka
        return 'Rp ' . number_format($this->gaji, 0, ',', '.') . ',00';
    }

    public static function countByCompany($companyId)
    {
        return self::where('id_company', $companyId)->count();
    }

    public function countSimilarPositions()
    {
        $position = $this->posisi;
        return self::where('posisi', $position)->count();
    }
}
