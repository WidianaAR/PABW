<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelPenerbangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jumlah',
        'harga',
        'status',
        'tanggal',
        'kategori',
        'keterangan',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
