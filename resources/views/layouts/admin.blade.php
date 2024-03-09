@extends('layouts.app')
@section('title', 'Admin - Community Empowerment')

@section('content')

<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
        <a href="{{route('dashboard.index')}}" title="Admin" class="flex flex-col mb-5 items-center">
            <img src="{{asset('images/logo-cda.png')}}" class="h-24" alt="Flowbite Logo">
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route('dashboard.index')}}" class="flex items-center p-2 text-gray-900 border border-black rounded-lg hover:bg-gray-300 group">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button" class="border border-black flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M480-120q-151 0-255.5-46.5T120-280v-400q0-66 105.5-113T480-840q149 0 254.5 47T840-680v400q0 67-104.5 113.5T480-120Zm0-479q89 0 179-25.5T760-679q-11-29-100.5-55T480-760q-91 0-178.5 25.5T200-679q14 30 101.5 55T480-599Zm0 199q42 0 81-4t74.5-11.5q35.5-7.5 67-18.5t57.5-25v-120q-26 14-57.5 25t-67 18.5Q600-528 561-524t-81 4q-42 0-82-4t-75.5-11.5Q287-543 256-554t-56-25v120q25 14 56 25t66.5 18.5Q358-408 398-404t82 4Zm0 200q46 0 93.5-7t87.5-18.5q40-11.5 67-26t32-29.5v-98q-26 14-57.5 25t-67 18.5Q600-328 561-324t-81 4q-42 0-82-4t-75.5-11.5Q287-343 256-354t-56-25v99q5 15 31.5 29t66.5 25.5q40 11.5 88 18.5t94 7Z" />
                    </svg>
                    <span class=" flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Database</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{route('dosen.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Dosen</a>
                    </li>
                    <li>
                        <a href="{{route('fakultas.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Fakultas</a>
                    </li>
                    <li>
                        <a href="{{route('jurusan-binaan.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Jurusan</a>
                    </li>
                    <li>
                        <a href="{{route('binaan.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Binaan</a>
                    </li>
                    <li>
                        <a href="{{route('area-kampus.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Area Kampus</a>
                    </li>
                    <li>
                        <a href="{{route('komunitas.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Komunitas</a>
                    </li>
                    <li>
                        <a href="{{route('pelatihan.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Pelatihan</a>
                    </li>
                    <li>
                        <a href="{{route('pertanyaan.index')}}" class="border border-[#008ED3] flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Data
                            Pertanyaan</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('histori-penilaian.index')}}" class="border border-black hover:bg-gray-300 flex items-center p-2 text-gray-900 rounded-lg group">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">History Penilaian</span>
                </a>
            </li>
            <li>
                <form method="post" action="{{route('users.logout')}}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center p-2 text-gray-100 border border-black rounded-lg bg-black hover:bg-gray-800 group w-full">
                        <svg class="fill-gray-100" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
                        </svg>
                        <span class="ms-3">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
<div class="p-4 sm:ml-64 bg-[#F1F1F1] min-h-screen">
    @yield('main')
</div>
</div>

@endsection