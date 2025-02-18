<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    protected $fillable = ['nama_barang', 'tgl', 'harga_awal', 'deskripsi_barang'];

    public function lelang()
    {
        return $this->hasOne(Lelang::class, 'id_barang');
    }

    public function historyLelang()
    {
        return $this->hasMany(HistoryLelang::class, 'id_barang');
    }
}
