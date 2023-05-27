<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPenerbangan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class);
    }

    public function transaksi_pemesanan()
    {
        return $this->hasMany(TransaksiPemesanan::class);
    }
}