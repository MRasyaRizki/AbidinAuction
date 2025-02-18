<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = false;
    protected $fillable = ['nama_petugas', 'username', 'password', 'id_level'];

    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'id_petugas');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
}
