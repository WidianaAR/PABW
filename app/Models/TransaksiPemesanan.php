<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemesanan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'hotel_penerbangan_id',
        'tanggal_booking',
        'jumlah',
        'total_biaya',
        'status_transaksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel_penerbangan()
    {
        return $this->belongsTo(HotelPenerbangan::class);
    }
}