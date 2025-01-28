<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanIzin extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_izin'; // Nama tabel
    protected $fillable = [
        'nik',
        'tgl_izin',
        'status',
        'keterangan',
        'status_approved',
        'created_at',
        'update_at',
    ];
}
