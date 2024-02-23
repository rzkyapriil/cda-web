@extends('layouts.admin')

@section('field')

<div class="w-full mt-16">
  <div class="flex mx-auto items-center flex-col gap-3 max-w-lg">
    <div class="flex flex-grow items-center mb-4">
      <h1 id="title" class="text-2xl sm:text-3xl font-extrabold text-center dark:text-white">Edit daerah</h1>
    </div>
    <form class="flex flex-col gap-4 w-full" method="POST" action="{{route('admin.update-daerah', $komunitas->id)}}">
      @csrf
      @method('PUT')
      <div class="flex flex-col flex-grow">
        <label for="nama_daerah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Daerah</label>
        <input type="text" id="nama_daerah" value="{{$daerah->nama_daerah}}" name="nama_daerah" placeholder="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      </div>
      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
    </form>
  </div>
</div>

@endsection