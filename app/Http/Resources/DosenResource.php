<?php

namespace App\Http\Resources;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $dosen = Dosen::join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('fakultas', 'binaan.fakultas_id', 'fakultas.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->select('dosen.*', 'binaan.program_binaan', 'fakultas.nama_fakultas', 'jurusan_binaan.nama_jurusan_binaan', 'area_kampus.nama_area_kampus')
            ->where('binaan_id', $this->binaan_id)
            ->first();

        return [
            'kode_dosen' => $this->kode_dosen,
            'nama_dosen' => $this->nama_dosen,
            'fakultas' => $dosen->nama_fakultas,
            'jurusan_binaan' => $dosen->nama_jurusan_binaan,
            'program_binaan' => $dosen->program_binaan,
            'nama_area_kampus' => $dosen->nama_area_kampus,
        ];
    }
}
