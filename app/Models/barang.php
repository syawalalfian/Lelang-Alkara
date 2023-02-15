<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
use App\Models\Lelang;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [ 'nama_barang','tanggal','harga_awal','deskripsi', 'image','created_at','updated_at'];
    
    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'id', 'barangs_id');
    }
}
