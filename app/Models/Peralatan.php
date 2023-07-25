<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peralatan',
        'jenis_peralatan',
        'merk_peralatan',
        'produsen',
        'id_divisi',
        'tahun_pembuatan',
        'tahun_batas',
        'umur',
        'kondisi',
    ];


    public function divisi(){
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id');
    }

    public function perawatan(){
        return $this->hasMany(PerawatanRutin::class, 'id_peralatan', 'id');
    }
    
    public function pengajuan(){
        return $this->hasMany(PengajuanPerbaikan::class, 'id_peralatan', 'id');
    }
}
