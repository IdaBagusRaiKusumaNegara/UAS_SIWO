<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = "pekerjaans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'Nama_Customer',
        'Nomor_HP',
        'unit_kerja_id',
        'Kategori_Pekerjaan',
        'Deskripsi_Pekerjaan',
        'Status_Pekerjaan'
    ];
}
