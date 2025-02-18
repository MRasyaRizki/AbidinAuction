<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'tb_lelang';
    protected $primaryKey = 'id_lelang';
    public $timestamps = false;
    protected $fillable = ['id_barang', 'tgl_lelang', 'harga_akhir', 'id_user', 'id_petugas', 'status'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_user');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
