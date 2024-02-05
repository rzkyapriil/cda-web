<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelatihan extends Model
{
    protected $table = "pelatihan";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'komunitas_id',
        'nama_pelatihan',
    ];

    public function komunitas(): HasMany
    {
        return $this->hasMany(Komunitas::class, 'komunitas_id', 'id');
    }
}
