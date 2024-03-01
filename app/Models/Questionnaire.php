<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    protected $table = "questionnaire";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'tanggal_pelaksanaan',
        'pelatihan_id',
        'komunitas_id',
        'dosen_id',
        'anon_user',
        'pertanyaan_id',
        'jawaban',
    ];

    public function pelatihan(): HasMany
    {
        return $this->hasMany(Pelatihan::class, 'pelatihan_id', 'id');
    }

    public function komunitas(): HasMany
    {
        return $this->hasMany(Komunitas::class, 'komunitas_id', 'id');
    }

    public function pertanyaan(): HasMany
    {
        return $this->hasMany(Pertanyaan::class, 'pertanyaan_id', 'id');
    }
}
