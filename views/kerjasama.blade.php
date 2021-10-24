@extends('layouts.main')

@section('dashboard')    
  <div class="container px-6 mx-auto grid">
    <div class="flex items-center"
    {{-- style="grid-template-columns: repeat(3,minmax(0,1fr));" --}}
    >
      <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
      >
        Kerjasama
      </h2>
      <div
        class="text-gray-500 focus-within:text-green-500" style="margin-left: auto"
      >
        <button
          class="bg-green-500 text-white active:bg-green-500 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          @click="openModalMOU">
          Dokumen MOU
        </button>
        @include('partial.modal_MOU')
      </div>
    </div>
    <div class="w-full overflow-hidden rounded-lg">
      <div class="w-full overflow-x-auto">
        <div class="grid mb-8 xl:grid-cols-3" style="gap: 0.5rem;">
          <!-- Card -->
          <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <div
              class="relative hidden h-12 w-12 mr-6 rounded-full md:block"
            >
              <img
                class="object-cover w-full h-full rounded-full"
                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                alt=""
                loading="lazy"
              />
              <div
                class="absolute inset-0 rounded-full shadow-inner"
                aria-hidden="true"
              ></div>
            </div>
            <div>
              <p class="font-semibold">Hans Burger</p>
              <p class="font-medium text-xs text-gray-600 dark:text-gray-400">
                Dusun Sukoharjo
              </p>
              <p class="font-medium text-xs text-gray-600 dark:text-gray-400">
                6/10/2020
              </p>                   
            </div>
            <div
              class="text-gray-500 focus-within:text-green-500" style="margin-left: auto"
            >
              <a href="/detail_kerjasama">
                <button
                  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                >
                  Lihat Detail
                </button>
              </a>
            </div>            
          </div>
        </div>      
      </div>
      @include("partial.pagination")
    </div>
  </div>
@endsection