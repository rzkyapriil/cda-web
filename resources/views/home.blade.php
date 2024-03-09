@extends('layouts.app')
@section('title', 'Community Empowerment')

@section('content')
  <div class="min-h-[100dvh] w-full flex flex-col">

    @include('components.header')

    <section class="flex flex-grow bg-center bg-no-repeat bg-cover"
      style="background-image: url('{{ asset('images/bg.png') }}');">
      <div class="flex flex-col justify-center px-4 max-w-screen-xl w-full mx-auto">
        <h1 class="mb-6 text-4xl font-bold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">
          Community Empowerment</h1>
        <p class="mb-8 text-xl md:text-xl lg:text-2xl max-w-[800px]">
          Platform untuk mengisi questionnaire workshop yang diadakan oleh
          Community Empowerment Binus University
        </p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
          <a href="{{ route('questionnaire') }}"
            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-black hover:bg-slate-600">
            <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
              width="24">
              <path
                d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm0-240q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm0-240q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640ZM480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm40 240v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
            </svg>
            Isi Questionnaire
          </a>
        </div>
      </div>
    </section>

    @include('components.footer')

  </div>
@endsection
