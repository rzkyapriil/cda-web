@extends('layouts.app')
@section('title', 'questionnaire')

@section('content')
<div id="questionnaire-1">
    <div class="flex items-center p-4 mb-4 text-sm text-black-800 font-bold border border-black-800 rounded-lg bg-yellow-300 flex justify-center"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium"></span> Mohon lengkapi jawaban yang yang sesuai menurut bapak/Ibu
        </div>
    </div>

    <div class="max-w-5xl mx-auto bg-black p-4 rounded-lg mb-4">
        <p class="text-xl font-extrabold text-center uppercase text-white">Questionnaire</p>
    </div>

    <div class="max-w-5xl mx-auto border border-gray-800 p-4 rounded-lg mb-4">
        <div class="w-full mx-auto">
            <label for="tanggal_pelaksanaan"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tanggal Kegiatan /
                Pelaksanaan</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker type="text" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                    class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                    placeholder="Select date">
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto border border-gray-800 p-4 rounded-lg mb-4">
        <div class="w-full mx-auto">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pelatihan</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-800 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="" selected disabled>Nama Pelatihan</option>
                @foreach($pelatihan as $data)
                <option value="{{$data->id}}">{{$data->nama_pelatihan . ' - ' . $data->mitra}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <form class="max-w-5xl mx-auto border border-gray-800 p-4 rounded-lg mb-4">
        <form class="max-w-sm mx-auto">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kode dan Nama Dosen
                yang memberikan pelatihan</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-800 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="" selected disabled>Nama Dosen</option>
                @foreach($dosen as $data)
                <option value="{{$data->id}}">{{$data->kode_dosen . ' - ' . $data->nama_dosen . ' - ' .
                    $data->nama_jurusan_binaan . ' - ' .
                    $data->nama_area_kampus}}</option>
                @endforeach
            </select>
        </form>
    </form>

    <div class="max-w-5xl mx-auto flex justify-end my-4">
        <button type="button" id="next"
            class="text-white bg-black font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Next
        </button>
    </div>
</div>


<div id="questionnaire-2" class="mx-auto flex flex-col mt-5 max-w-5xl">
    <div class="flex flex-col mt-5 border border-black bg-black rounded-2xl px-8 p-6 ">
        <p class="text-xl font-extrabold text-center uppercase text-white">Questionnaire</p>
    </div>
    <div class="flex flex-col mt-5 border border-black rounded-2xl px-8 p-6 ">
        <p class="text-lg font-semibold text-left text-black mb-4">Penjelasan Skala</p>
        <p class="text-lg font-light text-left text-black">1: Sangat Tidak Setuju</p>
        <p class="text-lg font-light text-left text-black">2: Tidak Setuju</p>
        <p class="text-lg font-light text-left text-black">3: Biasa Saja</p>
        <p class="text-lg font-light text-left text-black">4: Setuju</p>
        <p class="text-lg font-light text-left text-black">5: Sangat Setuju</p>
        <p class="text-lg font-light text-left text-black">6: Sangat Setuju Sekali</p>
    </div>

    @foreach($pertanyaan as $nomor => $data)
    <div class="flex flex-col mt-5 border rounded-2xl border-black px-8 p-6 ">
        <div class="text-center content-center justify-items-center mb-3">
            <p class="text-lg font-bold text-center uppercase text-black">{{$data->pertanyaan}}</p>
        </div>
        <div class="flex flex-col md:flex-row mt-5">
            <div class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                <p class="text-sm font-semibold text-center uppercase text-black">Sangat Tidak Setuju</p>
            </div>
            <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                <div class="mx-auto max-w-6xl px-3">
                    <label class="cursor-pointer">
                        <input type="radio" class="peer sr-only" name="jawaban-{{$nomor+1}}" />
                        <div
                            class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                            <p class="text-sm font-semibold text-center uppercase">1</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                <div class="mx-auto max-w-6xl px-3">
                    <label class="cursor-pointer">
                        <input type="radio" class="peer sr-only" name="jawaban-{{$nomor+1}}" />
                        <div
                            class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                            <p class="text-sm font-semibold text-center uppercase">2</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                <div class="mx-auto max-w-6xl px-3">
                    <label class="cursor-pointer">
                        <input type="radio" class="peer sr-only" name="jawaban-{{$nomor+1}}" />
                        <div
                            class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                            <p class="text-sm font-semibold text-center uppercase">3</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                <div class="mx-auto max-w-6xl px-3">
                    <label class="cursor-pointer">
                        <input type="radio" class="peer sr-only" name="jawaban-{{$nomor+1}}" />
                        <div
                            class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                            <p class="text-sm font-semibold text-center uppercase">4</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                <div class="mx-auto max-w-6xl px-3">
                    <label class="cursor-pointer">
                        <input type="radio" class="peer sr-only" name="jawaban-{{$nomor+1}}" />
                        <div
                            class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-center uppercase">5</p>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="grid justify-items-center mb-5 md:justify-items-end md:mb-0 basis-1/6 bg-transparent">
                <div class="mx-auto max-w-6xl px-3">
                    <label class="cursor-pointer">
                        <input type="radio" class="peer sr-only" name="jawaban-{{$nomor+1}}" />
                        <div
                            class="max-w-xl rounded-md bg-white border border-black p-2 px-8 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-center uppercase">6</p>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="grid grid-flow-col text-center content-center justify-items-center basis-1/6 bg-transparent">
                <p class="text-sm font-semibold text-center uppercase text-black">Sangat Setuju Sekali</p>
            </div>
        </div>
    </div>
    @endforeach

    <div class="flex flex-row-reverse bg-transparent p-6 ">
        <a href="{{route('home')}}"
            class="text-white bg-black hover:bg-gray-500 font-medium rounded-lg text-sm px-12 py-4 focus:outline-none uppercase">Submit</a>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
<script>
    $('#questionnaire-2').hide();

    $(document).ready(function () {
        $("#next").click(function () {
            $('#questionnaire-1').hide();
            $('#questionnaire-2').show();
        });
    });
</script>
@endsection