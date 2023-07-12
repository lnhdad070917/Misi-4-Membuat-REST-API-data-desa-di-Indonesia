<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'indonesia_districts';

    protected $fillable = [
        'code',
        'city_code',
        'name',
        'meta',
    ];

    // Relasi dengan Desa
    public function desas()
    {
        return $this->hasMany(Desa::class, 'district_code', 'code');
    }

    // Relasi dengan Kota
    public function kota()
    {
        return $this->belongsTo(Kota::class, 'city_code', 'code');
    }
}