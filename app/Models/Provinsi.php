<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'indonesia_provinces';

    protected $fillable = [
        'code',
        'name',
        'meta',
    ];

    // Relasi dengan Kota
    public function kotas()
    {
        return $this->hasMany(Kota::class, 'province_code', 'code');
    }

    // Relasi dengan Desa
    public function desas()
    {
        return $this->hasMany(Desa::class, 'district_code', 'code');
    }
}