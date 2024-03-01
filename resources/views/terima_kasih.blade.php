@extends('layouts.app')

@section('title', 'Terima kasih!')

@section('content')
  <div class="min-h-screen mx-auto flex flex-col items-center">
    @include('components.header')
    <section class="flex flex-grow px-4 md:px-2 mb-12 max-w-5xl">
      <div class="flex flex-col mt-12 border border-black rounded-2xl p-8 h-fit">
        <h1 class="text-lg md:text-xl font-bold text-center uppercase text-black">
          Terimakasih atas kesediaan bapak/ ibu sudah mengisi questionnaire ini. untuk informasi pelatihan silakan
          cek di <a href="https://ce.binus.ac.id" class="underline text-blue-400">https://ce.binus.ac.id</a>, untuk
          informasi lebih lanjut, hubungi 088888888.
        </h1>

        <div class="flex justify-center bg-transparent mt-6">
          <a href="{{ route('home') }}"
            class="text-white bg-black hover:bg-gray-700 font-bold rounded-lg px-8 py-3 focus:outline-none uppercase mx-auto">
            Kembali ke Home
          </a>
        </div>
      </div>
    </section>
    @include('components.footer')
  </div>
@endsection