@extends('layouts.app')
@section('title', 'Questionnaire - Community Empowerment')

@section('content')
  @include('components.header')
  <div class="flex items-center justify-center p-4 text-sm text-gray-800 font-bold bg-yellow-200">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3"
      aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <p class="font-medium">
      Mohon lengkapi jawaban yang sesuai menurut bapak/ibu. Jika pelatihan & komunitas belum tersedia, silahkan klik button tambah.
    </p>
  </div>

  @if (session('success'))
    <div id="alert-success"
      class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
      role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
        {{ session('success') }}
      </div>
      <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
  @elseif(session('errors'))
    <div id="alert-errors"
      class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
      role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
          d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
        {{ session('errors') }}
      </div>
      <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-errors" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
      </button>
    </div>
  @endif

  <form method="POST" action="{{ route('questionnaire.store') }}" class="max-w-3xl mx-auto px-4 md:px-2 mb-6">
    @csrf
    <div class="flex flex-col mt-5 border border-black bg-black rounded-xl py-4">
      <h1 class="text-lg md:text-xl font-bold text-center uppercase text-white">Questionnaire</h1>
    </div>

    <div id="questionnaire-1" class="mt-4 text-sm md:text-base space-y-4">
      <div class="border border-gray-800 p-6 rounded-xl">
        <label for="tanggal_pelaksanaan" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
          Tanggal Kegiatan / Pelaksanaan <span class="text-red-500">*</span>
        </label>

        <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" placeholder="Select date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required
            class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
      </div>

      <div class="border border-gray-800 p-6 rounded-xl">
        <label for="pelatihan" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
          Pelatihan <span class="text-red-500">*</span>
        </label>
        <div class="flex flex-row gap-2">
          <div class="relative w-full">
            <select data-hs-select='{
                "hasSearch": true,
                "searchPlaceholder": "Cari pelatihan",
                "searchClasses": "block w-full text-sm bg-white border-black rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                "searchWrapperClasses": "bg-gray-100 border-b border-black p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                "placeholder": "Pilih pelatihan",
                "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-gray-50 border border-black rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-black rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
              }' class="hidden" id="pelatihan" name="pelatihan" required>
              <option value="">Pilih pelatihan</option>
              @foreach ($pelatihan as $data)
              <option value="{{ $data->id }}">
                {{ $data->judul_pelatihan }}
              </option>
              @endforeach
            </select>
  
            <div class="absolute top-1/2 end-3 -translate-y-1/2">
              <svg class="flex-shrink-0 size-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
            </div>
          </div>

          <a href="{{ route('form-pelatihan.index') }}" class="flex bg-black fill-white hover:bg-gray-100 hover:fill-black w-fit justify-center items-center px-3 border border-black rounded-lg">
            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
          </a>
        </div>
        
      </div>

      <div class="border border-gray-800 p-6 rounded-xl">
        <label for="komunitas" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
          Komunitas <span class="text-red-500">*</span>
        </label>

        <div class="flex flex-row gap-2">
          <div class="relative w-full">
            <select data-hs-select='{
                "hasSearch": true,
                "searchPlaceholder": "Cari komunitas",
                "searchClasses": "block w-full text-sm bg-white border-black rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                "searchWrapperClasses": "bg-gray-100 border-b border-black p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                "placeholder": "Pilih komunitas",
                "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-gray-50 border border-black rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-black rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
              }' class="hidden" id="komunitas" name="komunitas" required>
              <option value="">Pilih komunitas</option>
              @foreach ($komunitas as $data)
              <option value="{{ $data->id }}">
                {{ $data->mitra . ' - ' . $data->jenis_komunitas }}
              </option>
              @endforeach
            </select>
  
            <div class="absolute top-1/2 end-3 -translate-y-1/2">
              <svg class="flex-shrink-0 size-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
            </div>
          </div>

          <a href="{{ route('form-komunitas.index') }}" class="flex bg-black fill-white hover:bg-gray-100 hover:fill-black w-fit justify-center items-center px-3 border border-black rounded-lg">
            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
          </a>
        </div>
      </div>

      <div class="border border-gray-800 p-6 rounded-xl">
        <label for="dosen" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
          Kode dan Nama Dosen <span class="text-red-500">*</span>
        </label>

        <div class="relative">
          <select data-hs-select='{
              "hasSearch": true,
              "searchPlaceholder": "Cari dosen",
              "searchClasses": "block w-full text-sm bg-white border-black rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
              "searchWrapperClasses": "bg-gray-100 border-b border-black p-2 -mx-1 sticky top-0 dark:bg-slate-900",
              "placeholder": "Pilih dosen",
              "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-gray-50 border border-black rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
              "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-black rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
              "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
              "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
            }' class="hidden" id="dosen" name="dosen" required>
            <option value="">Pilih dosen</option>
            @foreach ($dosen as $data)
            <option value="{{ $data->id }}">
              {{ $data->kode_dosen . ' - ' . $data->nama_dosen . ' - ' . $data->nama_jurusan_binaan . ' - ' . $data->nama_area_kampus }}
            </option>
            @endforeach
          </select>

          <div class="absolute top-1/2 end-3 -translate-y-1/2">
            <svg class="flex-shrink-0 size-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
          </div>
        </div>
      </div>

      <div class="flex justify-end">
        <button type="button" id="next"
          class="text-sm bg-gray-100 text-black border border-black hover:bg-black hover:text-white font-bold rounded-lg px-6 py-2.5 focus:outline-none uppercase">
          Next
        </button>
      </div>
    </div>

    <div id="questionnaire-2" class="hidden mt-4">
      <div class="flex flex-col border border-black rounded-xl py-6 px-8">
        <p class="text-lg font-bold mb-1.5">Penjelasan Skala</p>
        <p>1 : Sangat Tidak Setuju</p>
        <p>2 : Tidak Setuju</p>
        <p>3 : Biasa Saja</p>
        <p>4 : Setuju</p>
        <p>5 : Sangat Setuju</p>
        <p>6 : Sangat Setuju Sekali</p>
      </div>

      <div class="flex flex-col">
        @foreach ($pertanyaan as $nomor => $data)
          <div class="flex flex-col border rounded-xl border-black p-8 mt-4">
            <div class="text-center content-center justify-items-center">
              <p class="font-bold text-center uppercase text-black">{{ $data->pertanyaan }} <span class="text-red-500">*</span></p>
            </div>
            <div class="flex flex-col md:flex-row mt-6 gap-4 items-center justify-center">
              <div class="flex text-xs text-center uppercase font-medium">
                Sangat Tidak Setuju
              </div>

              <div class="flex flex-col md:flex-row gap-4">
                @for ($i = 1; $i <= 6; $i++)
                  <div class="mx-auto max-w-6xl">
                    <label class="cursor-pointer">
                      <input type="radio" class="peer sr-only" name="{{ 'p' . ($data->id + 12) }}"
                        value="{{ $i }}" required />
                      <div
                        class="rounded-md bg-white border border-black py-1.5 px-6 ring-2 ring-transparent transition-all duration-300 hover:shadow peer-checked:text-white peer-checked:bg-black">
                        <p class="text-sm font-semibold text-center uppercase"> {{ $i }} </p>
                      </div>
                    </label>
                  </div>
                @endfor
              </div>

              <div class="flex text-xs text-center uppercase text-black">
                Sangat Setuju Sekali
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="border border-gray-800 p-6 rounded-2xl mt-4">
        <label for="komentar" class="block mb-2.5 font-bold text-gray-900 dark:text-black">
          Komentar atau saran <span class="text-red-500">*</span>
        </label>

        <textarea id="komentar" placeholder="Berikan komentar . . ." name="komentar" rows="4" required
          class="bg-gray-50 border border-gray-800 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
      </div>

      <div class="flex justify-between mt-4">
        <button type="button" id="prev"
          class="text-sm bg-gray-100 text-black border border-black hover:bg-black hover:text-white font-bold rounded-lg px-6 py-2.5 focus:outline-none uppercase">
          PREVIOUS
        </button>

        <button type="submit"
          class="text-sm text-white bg-black hover:bg-gray-700 font-bold rounded-lg px-6 py-2.5 focus:outline-none uppercase">
          Submit
        </button>
      </div>
    </div>
  </form>

  @include('components.footer')

  <script>
    
    var head = document.getElementById('header');

    $(document).ready(function() {
      function isMobileDevice() {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        }

        function runOnMobile() {
          var se_pelatihan = document.getElementById("pelatihan");
          var se_komunitas = document.getElementById("komunitas");
          var se_dosen = document.getElementById("dosen");
          se_pelatihan.size = 1;
          se_komunitas.size = 1;
          se_dosen.size = 1;

          console.log("Running on a mobile device!");
        }

        function runOnDesktop() {
          var se_pelatihan = document.getElementById("pelatihan");
          var se_komunitas = document.getElementById("komunitas");
          var se_dosen = document.getElementById("dosen");
          se_pelatihan.size = 5;
          se_komunitas.size = 5;
          se_dosen.size = 5;
          
          console.log("Running on a desktop device!");
        }

        if (isMobileDevice()) {
          runOnMobile();
        } else {
          runOnDesktop();
        }

      function validateForm() {
        var tanggal_pelaksanaan = document.getElementById('tanggal_pelaksanaan').value;
        var pelatihan = document.getElementById('pelatihan').value;
        var komunitas = document.getElementById('komunitas').value;
        var dosen = document.getElementById('dosen').value;

        if (tanggal_pelaksanaan === '') {
          alert('Silahkan isi tanggal pelaksanaan');
          return false; // Prevent form submission
        }

        if (pelatihan === '') {
          alert('Silahkan pilih pelatihan');
          return false; // Prevent form submission
        }

        if (komunitas === '') {
          alert('Silahkan pilih komunitas');
          return false; // Prevent form submission
        }

        if (dosen === '') {
          alert('Silahkan pilih dosen');
          return false; // Prevent form submission
        }

        return true; // Allow form submission
      }

      $("#next").click(function() {
        let validate = validateForm()

        if(validate){
          head.scrollIntoView({ 
            behavior: 'smooth'
          });

          $('#questionnaire-1').hide();
          $('#questionnaire-2').show();
        }
      });

      $("#prev").click(function() {
        head.scrollIntoView({ 
          behavior: 'smooth'
        });

        $('#questionnaire-2').hide();
        $('#questionnaire-1').show();
      });
    });
  </script>
@endsection
