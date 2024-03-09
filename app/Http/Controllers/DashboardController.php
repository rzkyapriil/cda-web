<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DivisionByZeroError;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends Controller
{
    public function index()
    {
        $startDate =  Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $endDate = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
        $komunitas = DB::table('komunitas')->count();
        $pelatihan = DB::table('pelatihan')->count();
        $dosen = DB::table('questionnaire')->distinct('dosen_id')->count('dosen_id');
        $fakultas = DB::table('fakultas')->get();
        $jurusan = DB::table('jurusan_binaan')->get();
        $area = DB::table('area_kampus')->get();

        $jumlah_submit_quiz = DB::table('questionnaire')
            ->distinct('anon_user')
            ->whereBetween('questionnaire.created_at', [Carbon::now()->startOfDay()->format('Y-m-d H:i:s'), Carbon::now()->endOfDay()->format('Y-m-d H:i:s')])
            ->count();
        $jumlah_nilai = DB::table('questionnaire')->max('skor');

        return view('admin.dashboard', compact(
            'komunitas',
            'pelatihan',
            'dosen',
            'area',
            'jumlah_submit_quiz',
            'jumlah_nilai',
            'fakultas',
            'jurusan',
            'startDate',
            'endDate'
        ));
    }

    public function filter(Request $request)
    {
        $startDate =  Carbon::parse($request->tgl_mulai)->startOfDay()->format('Y-m-d H:i:s');
        $endDate = Carbon::parse($request->tgl_selesai)->endOfDay()->format('Y-m-d H:i:s');

        $komunitas = DB::table('komunitas')->count();
        $pelatihan = DB::table('pelatihan')->count();
        $dosen = DB::table('questionnaire')->distinct('dosen_id')->count('dosen_id');
        $fakultas = DB::table('fakultas')->get();
        $jurusan = DB::table('jurusan_binaan')->get();
        $area = DB::table('area_kampus')->get();

        $jumlah_submit_quiz = DB::table('questionnaire')
            ->whereBetween('questionnaire.created_at', [Carbon::now()->startOfDay()->format('Y-m-d H:i:s'), Carbon::now()->endOfDay()->format('Y-m-d H:i:s')])
            ->distinct('anon_user')
            ->count();
        $jumlah_nilai = DB::table('questionnaire')->max('skor');

        return view('admin.dashboard', compact(
            'komunitas',
            'pelatihan',
            'dosen',
            'area',
            'jumlah_submit_quiz',
            'jumlah_nilai',
            'fakultas',
            'jurusan',
            'startDate',
            'endDate'
        ));
    }

    public function getNilaiPerArea($startDate, $endDate, $idArea, $nilai)
    {
        $jumlah_nilai = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('area_kampus_id', $idArea)
            ->where('skor', $nilai)
            ->count();

        $jumlah_banyak_nilai = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('area_kampus_id', $idArea)
            ->count();

        try {
            $persentase = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $persentase = 0;
        }

        return $persentase;
    }

    public function getTotalNilaiPerArea($startDate, $endDate, $idArea)
    {
        $average =  DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('binaan.area_kampus_id', $idArea)
            ->avg('skor');


        return $average == null ? 0 : round($average, 3);
    }

    public function getNilaiPerFakultas($startDate, $endDate, $idFakultas, $nilai)
    {
        $jumlah_nilai = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('skor', $nilai)
            ->where('binaan.fakultas_id', $idFakultas)
            ->count();

        $jumlah_banyak_nilai = DB::table('questionnaire')->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')->where('fakultas_id', $idFakultas)
            ->count();

        try {
            $persentase = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $persentase = 0;
        }

        return $persentase;
    }

    public function getTotalNilaiPerFakultas($startDate, $endDate, $idFakultas)
    {
        $average = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('binaan.fakultas_id', $idFakultas)
            ->avg('skor');

        return $average == null ? 0 : round($average, 3);
    }

    public function getNilaiPerJurusan($startDate, $endDate, $idJurusan, $nilai)
    {
        $jumlah_nilai = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('questionnaire.skor', $nilai)
            ->where('binaan.jurusan_binaan_id', $idJurusan)
            ->count();

        $jumlah_banyak_nilai = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('binaan.jurusan_binaan_id', $idJurusan)
            ->count();

        try {
            $persentase = round(($jumlah_nilai / $jumlah_banyak_nilai) * 100, 2);
        } catch (DivisionByZeroError $e) {
            $persentase = 0;
        }

        return $persentase;
    }

    public function getTotalNilaiPerJurusan($startDate, $endDate, $idJurusan)
    {
        $average = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->where('binaan.jurusan_binaan_id', $idJurusan)
            ->avg('skor');

        return $average == null ? 0 : round($average, 3);
    }

    public function getTanggalPelaksanaan($anon_user, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->where('anon_user', $anon_user)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('tanggal_pelaksanaan')
            ->first();

        return Carbon::parse($data->tanggal_pelaksanaan)->format('d-m-Y');
    }

    public function getPelatihan($anon_user, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->join('pelatihan', 'questionnaire.pelatihan_id', 'pelatihan.id')
            ->where('anon_user', $anon_user)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('pelatihan.*')
            ->first();

        return $data;
    }

    public function getKomunitas($anon_user, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->join('komunitas', 'questionnaire.komunitas_id', 'komunitas.id')
            ->where('anon_user', $anon_user)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('komunitas.*')
            ->first();

        return $data;
    }

    public function getDosen($anon_user, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->where('anon_user', $anon_user)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('dosen.*')
            ->first();

        return $data;
    }

    public function getArea($anon_user, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('area_kampus', 'binaan.area_kampus_id', 'area_kampus.id')
            ->where('anon_user', $anon_user)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('area_kampus.nama_area_kampus')
            ->first();

        return $data->nama_area_kampus;
    }

    public function getJurusan($anon_user, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->join('dosen', 'questionnaire.dosen_id', 'dosen.id')
            ->join('binaan', 'dosen.binaan_id', 'binaan.id')
            ->join('jurusan_binaan', 'binaan.jurusan_binaan_id', 'jurusan_binaan.id')
            ->where('anon_user', $anon_user)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('jurusan_binaan.nama_jurusan_binaan')
            ->first();

        return $data->nama_jurusan_binaan;
    }

    public function getNilai($anon_user, $idPertanyaan, $startDate, $endDate)
    {
        $data = DB::table('questionnaire')
            ->where('anon_user', $anon_user)
            ->where('pertanyaan_id', $idPertanyaan)
            ->whereBetween('questionnaire.created_at', [$startDate, $endDate])
            ->select('questionnaire.skor')
            ->first();

        return $data->skor;
    }

    public function getKomentar($anon_user)
    {
        $data = DB::table('komentar')
            ->where('anon_user', $anon_user)
            ->select('komentar.*')
            ->first();

        return $data;
    }

    public function export(Request $request)
    {
        $data_quiz = DB::table('questionnaire')
            ->select('anon_user')
            ->whereBetween('questionnaire.created_at', [$request->startDate, $request->endDate])
            ->distinct('anon_user')
            ->get();

        $file_path_save = storage_path('app/template/download.xlsx');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        // Header
        $sheet->setCellValue('A1', 'Nomor');
        $sheet->setCellValue('B1', 'Tanggal Pelaksanaan');
        $sheet->setCellValue('C1', 'Judul Pelatihan ');
        $sheet->setCellValue('D1', 'Nama Komunitas');
        $sheet->setCellValue('E1', 'Jenis Komunitas');
        $sheet->setCellValue('F1', 'Kode Dosen ');
        $sheet->setCellValue('G1', 'Nama Dosen');
        $sheet->setCellValue('H1', 'Area Kampus');
        $sheet->setCellValue('I1', 'Jurusan Binaan ');

        $sheet->setCellValue('J1', 'Manajemen kegiatan Pengabdian yang efektif bagi masyarakat luas');
        $sheet->setCellValue('K1', 'Memfasilitasi kegiatan yang sesuai dengan kebutuhan masyarakat terkini');
        $sheet->setCellValue('L1', 'Narasumber yang berkualitas');
        $sheet->setCellValue('M1', 'Materi yang berbobot/layak');
        $sheet->setCellValue('N1', 'Gaya komunikasi yang interaktif');
        $sheet->setCellValue('O1', 'Saya merasa puas terhadap proses pelaksanaan kegiatan ini');

        $sheet->setCellValue('P1', 'Komentar & Saran');

        // Proses
        foreach ($data_quiz as $nomor => $data) {
            $sheet->setCellValue('A' . $nomor + 2, $nomor + 1);
            $sheet->setCellValue('B' . $nomor + 2, $this->getTanggalPelaksanaan($data->anon_user, $startDate, $endDate));
            $sheet->setCellValue('C' . $nomor + 2, $this->getPelatihan($data->anon_user, $startDate, $endDate)->judul_pelatihan);
            $sheet->setCellValue('D' . $nomor + 2, $this->getKomunitas($data->anon_user, $startDate, $endDate)->mitra);
            $sheet->setCellValue('E' . $nomor + 2, $this->getKomunitas($data->anon_user, $startDate, $endDate)->jenis_komunitas);
            $sheet->setCellValue('F' . $nomor + 2, $this->getDosen($data->anon_user, $startDate, $endDate)->kode_dosen);
            $sheet->setCellValue('G' . $nomor + 2, $this->getDosen($data->anon_user, $startDate, $endDate)->nama_dosen);
            $sheet->setCellValue('H' . $nomor + 2, $this->getArea($data->anon_user, $startDate, $endDate));
            $sheet->setCellValue('I' . $nomor + 2, $this->getJurusan($data->anon_user, $startDate, $endDate));

            $sheet->setCellValue('J' . $nomor + 2, $this->getNilai($data->anon_user, 1, $startDate, $endDate));
            $sheet->setCellValue('K' . $nomor + 2, $this->getNilai($data->anon_user, 2, $startDate, $endDate));
            $sheet->setCellValue('L' . $nomor + 2, $this->getNilai($data->anon_user, 3, $startDate, $endDate));
            $sheet->setCellValue('M' . $nomor + 2, $this->getNilai($data->anon_user, 4, $startDate, $endDate));
            $sheet->setCellValue('N' . $nomor + 2, $this->getNilai($data->anon_user, 5, $startDate, $endDate));
            $sheet->setCellValue('O' . $nomor + 2, $this->getNilai($data->anon_user, 6, $startDate, $endDate));

            $sheet->setCellValue('P' . $nomor + 2, $this->getKomentar($data->anon_user) != null ? $this->getKomentar($data->anon_user)->komentar : '');
        }

        // Menyimpan perubahan kembali ke file
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_path_save);

        // Menyiapkan response untuk mengunduh
        $response = Response::make(
            file_get_contents($file_path_save),
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename=rekap-penilaian_' . Carbon::parse($startDate)->format('d-m-Y') . '_' . Carbon::parse($startDate)->format('d-m-Y') . '.xlsx',
            ]
        );

        // Menghapus file setelah diunduh
        unlink($file_path_save);

        return $response;
    }
}
