<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    // $table->unsignedBigInteger('komunitas_id')->nullable(false);
    //         $table->unsignedBigInteger('dosen_id')->nullable(false);
    //         $table->string('anon_user', 20)->nullable(false);
    //         $table->unsignedBigInteger('pertanyaan_id')->nullable(false);
    //         $table->enum('jawaban', [1, 2, 3, 4, 5, 6])->nullable(false);

    protected $table = "questionnaire";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'tanggal_pelaksanaan',
        'komunitas_id',
        'dosen_id',
        'anon_user',
        'pertanyaan_id',
        'jawaban',
    ];

    public function pertanyaan(): HasMany
    {
        return $this->hasMany(Pertanyaan::class, 'pertanyaan_id', 'id');
    }
}
