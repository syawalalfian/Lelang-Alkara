<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}