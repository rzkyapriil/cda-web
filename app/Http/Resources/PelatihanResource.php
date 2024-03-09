<?php

namespace App\Http\Resources;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PelatihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $pelatihan = Pelatihan::join('komunitas', 'pelatihan.komunitas_id', 'komunitas.id')
            ->select('pelatihan.*', 'komunitas.mitra')->where('pelatihan.komunitas_id', $this->komunitas_id)->first();

        return [
            'nama_pelatihan' => $this->nama_pelatihan,
            'mitra' => $pelatihan->mitra,
        ];
    }
}
