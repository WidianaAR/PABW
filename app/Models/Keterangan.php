<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Keterangan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    public function hotel_penerbangan()
    {
        return $this->hasOne(HotelPenerbangan::class);
    }

    public function keteranganSatu(): Attribute
    {
        return Attribute::make(
        set: fn(string $value) => ucwords($value)
        ); }
}