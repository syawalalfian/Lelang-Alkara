<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\history_lelang;

class lelang extends Model
{
    use HasFactory;
    protected $table = 'lelangs';
    protected $fillable = [
        'barangs_id',
        'users_id',
        'harga_akhir',
        'tanggal_lelang',
        'status'
    ];

     public function barang()
    {
        return $this->hasOne('App\Models\Barang', 
        'id', 'barangs_id');
    }
    public function history_lelang()
    {
        return $this->belongsTo(HistoryLelang::class);
    }
    
    
}
