@extends('layouts.app')
@section('title', 'Form Komunitas - Community Empowerment')

@section('content')
  <div class="min-h-[100dvh] mx-auto flex flex-col items-center">
    @include('components.header')
    <div class="flex flex-grow w-full">
      <div class="w-full">
        <div class="flex items-center justify-center p-4 text-sm text-black-800 font-bold bg-gray-200">
          <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div class="font-medium">
            Mohon isi data dengan benar
          </div>
        </div>

        <form method="POST" action="{{ route('form-pelatihan.store') }}" class="max-w-3xl mx-auto px-4 md:px-2 mb-12">
          @csrf
          <div class="flex flex-col mt-5 border border-black bg-black rounded-xl py-4 mb-4">
            <h1 class="text-lg md:text-xl font-bold text-center uppercase text-white">Form Pelatihan</h1>
          </div>

          <div class="flex flex-col gap-4 border border-gray-800 p-6 rounded-xl">
            <div>
              <label for="judul_pelatihan" class="block mb-2.5 font-medium text-gray-900 dark:text-black">
                Judul Pelatihan
              </label>
              <div class="relative w-full">
                <input type="text" id="judul_pelatihan" name="judul_pelatihan" placeholder="Judul pelatihan" required
                  class="bg-gray-50 border border-gray-800 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              </div>
            </div>
          </div>

          <div class="flex flex-row-reverse mt-4">
            <button type="submit"
              class="text-sm text-white bg-black hover:bg-gray-700 font-bold rounded-lg px-6 py-2.5 focus:outline-none uppercase">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
    @include('components.footer')
  </div>
@endsection
