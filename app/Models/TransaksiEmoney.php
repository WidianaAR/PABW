<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiEmoney extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_transaksi',
        'jumlah',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
