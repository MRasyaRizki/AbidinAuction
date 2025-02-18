<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    protected $table = 'tb_masyarakat';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['nama_lengkap', 'username', 'password', 'telp'];

    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'id_user');
    }

    public function historyLelang()
    {
        return $this->hasMany(HistoryLelang::class, 'id_user');
    }
}
