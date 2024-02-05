<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Binaan extends Model
{
    protected $table = "binaan";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'fakultas_id',
        'jurusan_binaan_id',
        'program_binaan',
        'area_kampus_id',
    ];

    public function fakultas(): HasMany
    {
        return $this->hasMany(Fakultas::class, 'fakultas_id', 'id');
    }

    public function jurusan_binaan(): HasMany
    {
        return $this->hasMany(JurusanBinaan::class, 'jurusan_binaan_id', 'id');
    }

    public function area_kampus(): HasMany
    {
        return $this->hasMany(AreaKampus::class, 'area_kampus_id', 'id');
    }
}
