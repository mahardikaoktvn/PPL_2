@extends('layouts.main')

@section('dashboard')    
  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Dashboard
    </h2>
    {{-- @include('partial.openning_cta') --}}
    <!-- Cards -->
    <div class="grid gap-6 mb-8 xl:grid-cols-3" style="grid-template-columns: repeat(3,minmax(0,1fr));">
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Jumlah Akun perlu diverifikasi
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            {{ $data }}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Jumlah Data Pengajuan Kerjasama
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            {{$data1}}
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Jumlah Kerjasama Berlangsung
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
          {{$data2}}
          </p>
        </div>
      </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">Pengajuan Kerjasama</th>
              {{-- <th class="px-4 py-3">Alamat Lahan</th> --}}
              <th class="px-4 py-3"></th>
            </tr>
          </thead>
          @if($data4)
          @foreach($data4 as $key => $row)
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div
                    class="relative hidden h-12 w-12 mr-6 rounded-full md:block"
                  >
                    <img
                      class="object-cover w-full h-full rounded-full"
                      src="{{$row -> profile_photo}}"
                      alt=""
                      loading="lazy"
                    />
                    <div
                      class="absolute inset-0 rounded-full shadow-inner"
                      aria-hidden="true"
                    ></div>
                  </div>
                  <div>
                    <p class="font-semibold text-white">{{$row -> nama}}</p>
                    <p class="font-medium text-xs text-gray-600 dark:text-gray-400">
                      {{$data3[$key] -> lokasi_lahan}}
                    </p>
                    <p class="font-medium text-xs text-gray-600 dark:text-gray-400">
                      {{$row -> created_at}}
                    </p>                   
                  </div>
                  
                </div>
              </td>
              {{-- <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                >
                  Approved
                </span>
              </td> --}}
              <td class="px-4 py-3">
                <div
                  class="relative text-gray-500 focus-within:text-purple-600" style="float:right"
                >
                <form action="/detail_dashboard" method="post">
                @csrf
                  <input type="hidden" name="id_lahan" value="{{$data3[$key]->id_lahan}}">
                  <a>
                    <button
                      class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-green-500"
                    >
                      Lihat Detail
                    </button>
                  </a>
                </form>
                </div>
              </td>
            </tr>                  
          </tbody>
          @endforeach
          @endif
        </table>
      </div>
      @include("partial.pagination")
    </div>
  </div>
@endsection