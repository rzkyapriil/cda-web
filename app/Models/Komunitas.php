<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    protected $table = "komunitas";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'komunitas_id',
        'mitra',
        'nama_pic',
        'no_tlp',
        'email',
        'alamat',
        'jenis_usaha',
        'keterangan',
        'jenis_komunitas',
    ];
}
