@extends('layouts.admin')

@section('main')
<div class="rounded-lg dark:border-gray-700">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2.5 w-full mb-4">
        <div class="flex justify-center lg:justify-start w-full">
            <h1 class="flex self-center text-2xl font-extrabold dark:text-white uppercase">data jurusan binaan</h1>
        </div>

        <!-- Button with Modal -->
        <div class="flex justify-center lg:justify-end items-center gap-1.5 w-full">
            <form method="get" action="{{ route('admin.cari-jurusan-binaan') }}" class="flex">
                <input type="text" id="cari" name="cari" placeholder="cari nama jurusan binaan" class="bg-gray-50 border border-black text-gray-900 text-xs rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-60 h-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <button type="submit" title="Cari" class="bg-black hover:bg-gray-800 text-xs text-white px-4 rounded-e-lg">Cari</button>
            </form>

            <button data-modal-target="add-modal" data-modal-toggle="add-modal" title="Tambah" class="flex self-center h-[28.5px] text-white bg-black hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer">
                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Add modal -->
    <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 border border-black">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h1 class="my-4 text-lg text-center font-bold text-gray-900 dark:text-white uppercase">
                        tambahkan jurusan binaan
                    </h1>
                    <form class="space-y-6" method="POST" action="{{ route('admin.create-jurusan-binaan') }}">
                        @csrf
                        <div>
                            <label for="nama_jurusan_binaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Jurusan Binaan</label>
                            <input type="text" id="nama_jurusan_binaan" name="nama_jurusan_binaan" placeholder="jurusan binaan" class="bg-gray-50 border border-black text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-black hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div id="alert-success" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @elseif(session('errors'))
    <div id="alert-errors" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('errors') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-errors" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-xs text-left text-gray-500 dark:text-gray-400">
            <thead class="text-white uppercase bg-black dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-2.5 py-3">
                        No
                    </th>
                    <th scope="col" class="px-2.5 py-3">
                        Nama Jurusan Binaan
                    </th>

                    <th scope="col" class="px-5 py-3">
                        <span class="sr-only">Edit</span>
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jurusan_binaan as $nomor => $data)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-2.5 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $nomor + 1 }}
                    </td>
                    <td class="px-2.5 py-2">
                        {{ $data->nama_jurusan_binaan }}
                    <td class="px-2.5 py-2 text-right flex justify-end">
                        <form method="POST" action="{{ route('admin.edit-jurusan-binaan', $data->id) }}">
                            @csrf
                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4 bg-none">
                                Edit
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.delete-jurusan-binaan', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end items-center mt-4 gap-1.5 w-full font-medium text-xs">
        <div class="flex items-center w-fit gap-1.5">
            <div class="flex items-center border border-black p-1.5 rounded-lg">
                {{ $jurusan_binaan->currentPage() }}
                <svg class="w-4 h-4 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path d="M400-280v-400l200 200-200 200Z" />
                </svg>
                {{ $jurusan_binaan->lastPage() }}
            </div>
            <div class="flex items-center border border-black p-1.5 rounded-lg">
                {{ $jurusan_binaan->total() }}
            </div>
        </div>

        <div class="flex items-center w-fit">
            <a href="{{ $jurusan_binaan->previousPageUrl() }}" title="Sebelumnya" class="flex h-[30px] p-1.5 self-center text-white bg-black hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-s-lg dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer">
                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path d="M560-280 360-480l200-200v400Z" />
                </svg>
            </a>

            <a href="{{ $jurusan_binaan->nextPageUrl() }}" title="Selanjutnya" class="flex h-[30px] p-1.5 self-center text-white bg-black hover:bg-gray-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-e-lg dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer">
                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960">
                    <path d="M400-280v-400l200 200-200 200Z" />
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection