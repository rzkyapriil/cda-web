<header class="flex w-full">
  <nav class="bg-white w-full z-20 top-0 start-0 border-b border-[#008ED3]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="{{ route('home') }}" class="flex items-center rtl:space-x-reverse">
        <img src="{{ asset('images/logo-cda.png') }}" class="h-14" alt="Flowbite Logo">
      </a>
      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
          class=" bg-white ring-1 ring-black hover:bg-black hover:text-white rounded-full text-sm px-5 py-2 text-center">Login</button>
      </div>
    </div>
  </nav>

  <div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-[400px] max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white bg-opacity-80 rounded-3xl shadow px-6">
        <!-- Modal header -->
        <div class="absolute right-0 p-4">
          <button type="button" data-modal-hide="authentication-modal"
            class="end-2.5 text-gray-400 bg-transparent hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <div class="flex flex-col items-center py-8">
          <img src="{{ asset('images/logo-cda.png') }}" class="h-32 " alt="Logo CDA" />
        </div>
        <!-- Modal body -->
        <div class="pb-8 mx-auto">
          <form class="flex flex-col gap-6" method="POST" action="{{ route('users.login') }}">
            @csrf
            <div>
              <input type="username" name="username" id="username" placeholder="username" required
                class="bg-gray-50 border border-[#008ED3] text-gray-900 rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div>
              <input type="password" name="password" id="password" placeholder="password" required
                class="bg-gray-50 border border-[#008ED3] text-gray-900 rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <button type="submit"
              class="w-full text-white bg-[#008ED3] hover:bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center capitalize">
              login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>