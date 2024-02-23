@extends('layouts.admin')

@section('main')
<div class="w-full my-8">
    <div class="flex mx-auto items-center flex-col gap-3 max-w-lg">
        <div class="flex flex-grow items-center mb-2">
            <h1 id="title" class="text-2xl font-bold text-center dark:text-white uppercase">Edit komunitas</h1>
        </div>
        <form class="flex flex-col gap-5 w-full" method="POST" action="{{ route('admin.update-komunitas', $komunitas->id) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="komunitas_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID
                    Komunitas
                </label>
                <input type="text" id="komunitas_id" name="komunitas_id" placeholder="komunitas" value="{{ $komunitas->komunitas_id }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="mitra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mitra
                </label>
                <input type="text" id="mitra" name="mitra" placeholder="mitra" value="{{ $komunitas->mitra }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="nama_pic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama PIC
                </label>
                <input type="text" id="nama_pic" name="nama_pic" placeholder="nama" value="{{ $komunitas->nama_pic }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="no_tlp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telepon
                </label>
                <input type="text" id="no_tlp" name="no_tlp" placeholder="no.Tlp" value="{{ $komunitas->no_tlp }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                </label>
                <input type="text" id="email" name="email" placeholder="email" value="{{ $komunitas->email }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                </label>
                <input type="text" id="alamat" name="alamat" placeholder="alamat" value="{{ $komunitas->alamat }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="jenis_usaha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Usaha
                </label>
                <input type="text" id="jenis_usaha" name="jenis_usaha" placeholder="jenis_usaha" value="{{ $komunitas->jenis_usaha }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="jenis_komunitas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Komunitas
                </label>
                <input type="text" id="jenis_komunitas" name="jenis_komunitas" placeholder="jenis_komunitas" value="{{ $komunitas->jenis_komunitas }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div>
                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan
                </label>
                <input type="text" id="keterangan" name="keterangan" placeholder="keterangan" value="{{ $komunitas->keterangan }}" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>


            <button type="submit" class="w-full text-white bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
        </form>
    </div>
</div>
@endsection