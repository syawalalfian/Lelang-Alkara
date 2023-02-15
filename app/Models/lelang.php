<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

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

     public function lelang()
    {
        return $this->belongsTo(Lelang::class);
    }
}
