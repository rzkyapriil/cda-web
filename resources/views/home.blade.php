@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="min-h-screen min-w-full flex flex-col">
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white bg-opacity-80  rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="flex flex-col items-center mb-4">
                    <img src="{{asset('images/logo-cda.png')}}" class="h-28 " alt="Logo CDA" />
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="POST" action="{{route('users.login')}}">
                        @csrf
                        <div>
                            <input type="username" name="username" id="username"
                                class="bg-gray-50 border border-[#008ED3] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="username" required>
                        </div>
                        <div>
                            <input type="password" name="password" id="password" placeholder="password"
                                class="bg-gray-50 border border-[#008ED3] text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-[#008ED3] hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            LOGIN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <header>
        <nav class="bg-white w-full z-20 top-0 start-0 border-b border-[#008ED3]">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{route('home')}}" class="flex items-center rtl:space-x-reverse">
                    <img src="{{asset('images/logo-cda.png')}}" class="h-14" alt="Flowbite Logo">
                </a>
                <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        type="button"
                        class="text-black bg-white ring-2 ring-black hover:bg-gray-400 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</button>
                </div>
            </div>
        </nav>
    </header>

    <section
        class="flex flex-grow bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{asset('images/bg.png')}}');">
        <div class="flex flex-col justify-center py-24 lg:py-56 px-48">
            <h1
                class="mb-4 text-4xl pr-96 font-extrabold tracking-tight leading-none text-black md:text-5xl lg:text-6xl">
                Community Development Academic</h1>
            <p class="mb-8 text-lg font-normal text-black lg:text-xl pr-80">Platform untuk mengisi questionnaire
                workshop yang diadakan oleh Community Development Academic (CDA) Binus University</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                <a href="{{route('questionnaire')}}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-black hover:bg-slate-600">
                    <svg class="fill-white mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                        width="24">
                        <path
                            d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm0-240q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm0-240q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640ZM480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm40 240v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                    </svg>
                    isi questionnaire
                </a>
            </div>
        </div>
    </section>
    <footer class="bg-white py-5 border-t border-[#008ED3]">
        <div class="w-full max-w-screen-xl mx-auto">
            <span class="block text-sm text-black sm:text-center">© 2024 <a href="{{route('home')}}"
                    class="hover:underline">Community Development Academic™</a>. All Rights Reserved.</span>
        </div>
    </footer>
</div>

@endsection