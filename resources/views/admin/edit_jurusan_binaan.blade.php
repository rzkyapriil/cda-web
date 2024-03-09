@extends('layouts.admin')

@section('main')
<div class="w-full mt-8">
    <div class="flex mx-auto items-center flex-col max-w-lg">
        <div class="flex flex-grow items-center mb-2">
            <h1 id="title" class="text-2xl font-bold text-center dark:text-white uppercase">edit jurusan</h1>
        </div>
        <form class="flex flex-col gap-5 w-full" method="POST" action="{{ route('jurusan-binaan.update', $jurusan_binaan->id) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_jurusan_binaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Jurusan Binaan</label>
                <input type="text" id="nama_jurusan_binaan" name="nama_jurusan_binaan" placeholder="jurusan binaan" value="{{ $jurusan_binaan->nama_jurusan_binaan }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <button type="submit" class="w-full text-white bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
        </form>
    </div>
</div>
@endsection