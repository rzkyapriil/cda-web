@extends('layouts.app')

@section('title', 'Terima kasih!')

@section('content')

<div class="max-w-5xl mx-auto px-4 md:px-2 mb-12">
    <div class="flex flex-col mt-12 border border-black rounded-2xl py-4 md:py-5">
        <h1 class="text-lg md:text-xl font-bold text-center uppercase text-black">Terima kasih atas kesediaan bapak /
            Ibu
            sudah mengisi Quesioner ini <br>
            Dan Jangan Lupa untuk mengirim Paper Hasil Pengabdian kepada Masyarakat ke email
            cda@binus.edu. </h1>

        <div class="flex justify-center bg-transparent mt-6">
            <a href="{{route('home')}}"
                class="text-white bg-black hover:bg-gray-700 font-bold rounded-lg px-8 py-3 focus:outline-none uppercase mx-auto">Next</a>
        </div>
    </div>
</div>


@endsection