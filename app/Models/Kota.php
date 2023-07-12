<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'indonesia_cities';

    protected $fillable = [
        'code',
        'province_code',
        'name',
        'meta',
    ];

    // Relasi dengan District
    public function districts()
    {
        return $this->hasMany(District::class, 'city_code', 'code');
    }

    // Relasi dengan Provinsi
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'province_code', 'code');
    }
}