<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    protected $table = "dosen";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'binaan_id',
        'kode_dosen',
        'nama_dosen',
    ];

    public function binaan(): HasMany
    {
        return $this->hasMany(Binaan::class, 'binaan_id', 'id');
    }
}
