@extends('layouts.admin')

@section('main')
<div class="w-full mt-8">
    <div class="flex mx-auto items-center flex-col gap-3 max-w-lg">
        <div class="flex flex-grow items-center mb-2">
            <h1 id="title" class="text-2xl font-bold text-center dark:text-white uppercase">edit binaan</h1>
        </div>
        <form class="flex flex-col gap-5 w-full" method="POST" action="{{ route('admin.update-binaan', $binaan->id) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="fakultas_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fakultas</label>
                <select type="text" id="fakultas_id" name="fakultas_id" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" selected disabled>Pilih Fakultas</option>
                    @foreach ($fakultas as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $binaan->fakultas_id ? 'selected' : '' }}>
                        {{ $data->nama_fakultas }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="jurusan_binaan_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan Binaan</label>
                <select type="text" id="jurusan_binaan_id" name="jurusan_binaan_id" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" selected disabled>Jurusan Binaan</option>
                    @foreach ($jurusan_binaan as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $binaan->jurusan_binaan_id ? 'selected' : '' }}>
                        {{ $data->nama_jurusan_binaan }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="program_binaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                    Jurusan Binaan</label>
                <input type="text" id="program_binaan" name="program_binaan" placeholder="jurusan binaan" value="{{ $binaan->program_binaan }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div>
                <label for="area_kampus_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Area
                    kampus</label>
                <select type="text" id="area_kampus_id" name="area_kampus_id" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" selected disabled>Pilih area kampus</option>
                    @foreach ($area_kampus as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $binaan->area_kampus_id ? 'selected' : '' }}>
                        {{ $data->nama_area_kampus }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full text-white bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
        </form>
    </div>
</div>
@endsection