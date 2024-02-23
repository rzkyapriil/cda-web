@extends('layouts.app')
@section('title', 'Questionnaire')

@section('content')
<div class="items-center py-2.5 mb-4 text-sm text-black-800 font-bold bg-yellow-200 flex justify-center px-4 md:px-0">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="font-medium">
        Mohon lengkapi jawaban yang sesuai menurut bapak/ibu.<br>
        Jika komunitas bapak/ibu belum tersedia, silahkan menghubungi Community Empowerment, ke email cda@binus.edu
    </div>
</div>
<form method="POST" action="{{ route('create-questionnaire') }}" class="max-w-5xl mx-auto px-4 md:px-2 mb-12">
    @csrf
    <div class="flex flex-col mt-5 border border-black bg-black rounded-2xl py-4 md:py-5">
        <h1 class="text-lg md:text-xl font-bold text-center uppercase text-white">Questionnaire</h1>
    </div>

    <div id="questionnaire-1" class="mt-5 text-sm md:text-base">
        <div class="border border-gray-800 p-6 rounded-lg">
            <label for="tanggal_pelaksanaan" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
                Tanggal Kegiatan / Pelaksanaan
            </label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input datepicker type="text" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date">
            </div>
        </div>

        <div class="border border-gray-800 p-6 rounded-lg mt-6">
            <label for="pelatihan" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
                Pelatihan
            </label>

            {{-- searching --}}
            <div class="mb-2.5 flex">
                <input id="search_pelatihan" type="text" placeholder="Search nama pelatihan" onkeyup="filterOptions('search_pelatihan', 'pelatihan')" class="bg-gray-50 border border-gray-800 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <select id="pelatihan" name="pelatihan" size="5" class="bg-gray-50 border border-gray-800 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($pelatihan as $data)
                <option value="{{ $data->id }}">
                    {{ $data->nama_pelatihan . ' - ' . $data->jenis_komunitas . ' - ' . $data->mitra }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="border border-gray-800 p-6 rounded-lg mt-6">
            <label for="dosen" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
                Kode dan Nama Dosen
            </label>

            {{-- searching --}}
            <div class="mb-2.5 flex">
                <input id="search_dosen" type="text" placeholder="Search nama dosen" onkeyup="filterOptions('search_dosen', 'dosen')" class="bg-gray-50 border border-gray-800 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>

            <select id="dosen" name="dosen" size="5" class="bg-gray-50 border border-gray-800 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @foreach ($dosen as $data)
                <option value="{{ $data->id }}">
                    {{ $data->kode_dosen . ' - ' . $data->nama_dosen . ' - ' . $data->nama_jurusan_binaan . ' - ' . $data->nama_area_kampus }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-row-reverse bg-transparent mt-6">
            <button type="button" id="next" class="text-white bg-black hover:bg-gray-700 font-bold rounded-lg px-8 py-3 focus:outline-none uppercase">Next</button>
        </div>
    </div>


    <div id="questionnaire-2" class="hidden mt-5">
        <div class="flex flex-col border border-black rounded-2xl p-8 text-lg">
            <p class="text-xl font-bold mb-2">Penjelasan Skala</p>
            <p>1 : Sangat Tidak Setuju</p>
            <p>2 : Tidak Setuju</p>
            <p>3 : Biasa Saja</p>
            <p>4 : Setuju</p>
            <p>5 : Sangat Setuju</p>
            <p>6 : Sangat Setuju Sekali</p>
        </div>

        <div class="flex flex-col">
            @foreach ($pertanyaan as $nomor => $data)
            <div class="flex flex-col border rounded-2xl border-black p-8 mt-6">
                <div class="text-center content-center justify-items-center">
                    <p class="text-xl font-bold text-center capitalize text-black">{{ $data->pertanyaan }}</p>
                </div>
                <div class="flex flex-col md:flex-row mt-6 gap-4 items-center justify-center">
                    <div class="flex text-sm text-center uppercase text-black">
                        Sangat Tidak Setuju
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        @for ($i = 1; $i <= 6; $i++) <div class="mx-auto max-w-6xl">
                            <label class="cursor-pointer">
                                <input type="radio" class="peer sr-only" name="{{ 'p' . ($data->id+12) }}" value="{{ $i }}" />
                                <div class="rounded-md bg-white border border-black py-1.5 px-7 ring-2 ring-transparent transition-all hover:shadow peer-checked:text-white peer-checked:bg-black">
                                    <p class="text-sm font-semibold text-center uppercase">{{ $i }}
                                    </p>
                                </div>
                            </label>
                    </div>
                    @endfor
                </div>

                <div class="flex text-sm text-center uppercase text-black">
                    Sangat Setuju Sekali
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- <div class="border border-gray-800 p-6 rounded-2xl mt-6">
        <label for="dosen" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
          Komentar atau saran
        </label>

        <textarea id="komentar" placeholder="komentar" rows="4"
          class="bg-gray-50 border border-gray-800 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
      </div> --}}

    <div class="flex flex-row-reverse bg-transparent mt-6">
        <button type="submit" class="text-white bg-black hover:bg-gray-700 font-bold rounded-lg px-8 py-3 focus:outline-none uppercase">
            Submit
        </button>
    </div>

    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script>
        $('#questionnaire-2').hide();

        $(document).ready(function() {
            $("#next").click(function() {
                $('#questionnaire-1').hide();
                $('#questionnaire-2').show();
            });
        });
    </script>

    <script>
        function filterOptions(inputTagName, selectName) {
            const input = document.getElementById(inputTagName).value.toLowerCase();
            const select = document.getElementById(selectName);
            const options = select.getElementsByTagName('option');

            for (let i = 0; i < options.length; i++) {
                const text = options[i].textContent.toLowerCase();
                if (text.includes(input)) {
                    options[i].style.display = '';
                } else {
                    options[i].style.display = 'none';
                }
            }
        }

        // async function getDosen() {
        //   const selectElement = document.getElementById('dosen');
        //   try {
        //     const response = await axios.get('http://127.0.0.1:8000/api/dosen');
        //     response.data.data.forEach(item => {
        //       // Create an option element
        //       const option = document.createElement('option');
        //       // Set the value attribute to the kode_dosen
        //       option.value = item.kode_dosen;
        //       // Set the text content to the nama_dosen
        //       option.textContent = `${item.kode_dosen} - ${item.nama_dosen} - ${item.nama_area_kampus}`;
        //       // Append the option to the select element
        //       selectElement.appendChild(option);
        //     });
        //   } catch (error) {
        //     console.error(error);
        //   }
        // }

        // async function getPelatihan() {
        //   const selectElement = document.getElementById('pelatihan');
        //   try {
        //     const response = await axios.get('http://127.0.0.1:8000/api/pelatihan');
        //     response.data.data.forEach(item => {
        //       // Create an option element
        //       const option = document.createElement('option');
        //       // Set the value attribute to the kode_dosen
        //       option.value = item.id;
        //       // Set the text content to the nama_dosen
        //       option.textContent = `${item.nama_pelatihan} - ${item.mitra}`;
        //       // Append the option to the select element
        //       selectElement.appendChild(option);
        //     });
        //   } catch (error) {
        //     console.error(error);
        //   }
        // }

        // getDosen()
        // getPelatihan()
    </script>
    @endsection