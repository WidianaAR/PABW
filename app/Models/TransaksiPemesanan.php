<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_penerbangan_id',
        'status_transaksi',
        'tanggal_booking',
        'jumlah',
        'total_biaya',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function hotel_penerbangan() {
        return $this->belongsTo(HotelPenerbangan::class);
    }
}
