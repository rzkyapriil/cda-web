@extends('layouts.admin')

@section('main')
  <div class="p-4 flex-col flex mx-auto">
    <div class="flex flex-col justify-center items-center border rounded-2xl border-black py-8">
      <div class="text-center content-center justify-items-center">
        <p class="text-2xl font-bold text-center uppercase text-black">History Penilaian</p>
      </div>
      <div class="flex flex-col mt-5 gap-6 w-full max-w-[480px] text-xs">
        <form method="post" action="{{ route('admin.cari-histori-penilaian') }}"
          class="flex flex-col w-full justify-center gap-3">
          @csrf
          <div>
            <label for="area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area
              Kampus</label>
            <select type="text" id="area" name="area"
              class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="" selected> - </option>
              @foreach ($area as $data)
                @if (!isset($data_area))
                  <option value="{{ $data->id }}">{{ $data->nama_area_kampus }}</option>
                @else
                  <option value="{{ $data->id }}" {{ $data->id == $data_area ? 'selected' : '' }}>
                    {{ $data->nama_area_kampus }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div>
            <label for="fakultas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas</label>
            <select type="text" id="fakultas" name="fakultas"
              class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="" selected> - </option>
              @foreach ($fakultas as $data)
                @if (!isset($data_fakultas))
                  <option value="{{ $data->id }}">{{ $data->nama_fakultas }}</option>
                @else
                  <option value="{{ $data->id }}" {{ $data->id == $data_fakultas ? 'selected' : '' }}>
                    {{ $data->nama_fakultas }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div>
            <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan
              Binaan</label>
            <select type="text" id="jurusan" name="jurusan"
              class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="" selected> - </option>
              @foreach ($jurusan as $data)
                @if (!isset($data_jurusan))
                  <option value="{{ $data->id }}">{{ $data->nama_jurusan_binaan }}</option>
                @else
                  <option value="{{ $data->id }}" {{ $data->id == $data_jurusan ? 'selected' : '' }}>
                    {{ $data->nama_jurusan_binaan }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="flex flex-col sm:flex-row w-full gap-3">
            @if (!isset($data_tgl_mulai))
              <div class="w-full">
                <label for="tgl_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                  Mulai</label>
                <input type="date" id="tgl_mulai" name="tgl_mulai"
                  class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              </div>
            @else
              <div class="w-full">
                <label for="tgl_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                  Mulai</label>
                <input type="date" id="tgl_mulai" name="tgl_mulai" value="{{ $data_tgl_mulai }}"
                  class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              </div>
            @endif
            @if (!isset($data_tgl_selesai))
              <div class="w-full">
                <label for="tgl_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                  Selesai</label>
                <input type="date" id="tgl_selesai" name="tgl_selesai"
                  class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              </div>
            @else
              <div class="w-full">
                <label for="tgl_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                  Selesai</label>
                <input type="date" id="tgl_selesai" name="tgl_selesai" value="{{ $data_tgl_selesai }}"
                  class="text-sm bg-gray-50 border border-black text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              </div>
            @endif
          </div>
          <div class="flex justify-center w-full mt-3">
            <button type="submit"
              class="w-full text-white bg-black hover:bg-gray-700 focus:outline-none font-medium rounded-lg text-sm px-5 py-3 text-center">
              Search
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="flex flex-col items-center justify-center h-fit mb-24 rounded bg-transparent mt-10">
      <!-- <h1 class="text-xl text-black font-bold uppercase">
                              Rata - rata nilai
                          </h1> -->
      {{-- @if (isset($data_quiz))
        <div class="text-pretty">
          {{ $data_quiz }}
        </div>
      @endif --}}

      <div id="chart" class="flex"></div>
    </div>
  </div>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Skor", "Persentase", {
          role: "style"
        }],

        @for ($i = 1; $i <= 6; $i++)
          ["{{ $i }}",
            @if (isset($data_area) or
                    isset($data_fakultas) or
                    isset($data_jurusan) or
                    isset($data_tgl_mulai) or
                    isset($data_tgl_selesai))
              {{ app()->make('App\Http\Controllers\HistoriPenilaianController')->getNilai($data_area, $data_fakultas, $data_jurusan, $data_tgl_mulai, $data_tgl_selesai, $i) }},
            @endif
            getRandomColor()
          ],
        @endfor
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
        {
          calc: "stringify",
          sourceColumn: 1,
          type: "string",
          role: "annotation"
        },
        2
      ]);

      var options = {
        title: 'Rata-rata Skor',
        width: 800,
        height: 480,
        bar: {
          groupWidth: "80%"
        },
        legend: {
          position: "none"
        },
        backgroundColor: '#f0f0f0'
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chart"));
      chart.draw(view, options);
    }

    function getRandomColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }
  </script>
@endsection
