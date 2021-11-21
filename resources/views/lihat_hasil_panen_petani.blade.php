@extends('layouts.main_petani')

@section('petani')    
  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Hasil Panen
    </h2>
    {{-- @include('partial.openning_cta') --}}
    <!-- Cards -->
    <div class="grid gap-6 mb-8 xl:grid-cols-2" style="grid-template-columns: repeat(2,minmax(0,1fr));">
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
            Bagi Hasil Petani
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            Rp {{$bgptn}}
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
            Bagi Hasil Mitra
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            Rp {{$bgmtr}}
          </p>
        </div>
      </div>
    </div>
    <div class="w-full md:w-9/12 mx-2 h-64">
      <div class="bg-white p-3 shadow-sm rounded-sm">
        <div
          class="flex items-center justify-between p-3 mb-1 text-sm font-semibold text-white bg-green-500 rounded-md shadow-md">
          <div class="flex items-center">
            <span clas="text-green-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </span>
            <span class="px-3 tracking-wide">Hasil Pembayaran</span>
          </div>
        </div>
        <div class="text-gray-700">
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="tracking-wide text-left text-gray-700 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                  >
                    <th class="px-2 py-2 text-medium text-sm">Tanggal Transaksi</th>
                    <th class="px-2 py-2 text-medium text-sm">Pembeli</th>
                    <th class="px-2 py-2 text-medium text-sm">Berat(kg)</th>
                    <th class="px-2 py-2 text-medium text-sm">Harga Jual</th>
                    <th class="px-2 py-2 text-medium text-sm">Foto Bukti</th>
                  </tr>
                </thead>
                <tbody
                  class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                    @if($penjualan)
                    @foreach($penjualan as $pjl)
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-2 py-2 text-sm">
                      {{$pjl -> tanggal_transaksi}}
                    </td>
                    <td class="px-2 py-2 text-sm">
                      {{$pjl -> pembeli}}
                    </td>
                    <td class="px-2 py-2 text-sm">
                      {{$pjl -> berat}}
                    </td>
                    <td class="px-2 py-2 text-sm">
                      {{$pjl -> harga_terjual}}
                    </td>
                    <td class="px-2 py-2 text-sm">
                      <a href="/{{$pjl -> bukti_pembayaran}}" target="_blank" class="px-1 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                        Download
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            {{-- @include('partial.pagination') --}}
          </div>
        </div>
      </div>
      <div class="flex mt-3 item-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
        <a href="/detail_pengajuan_petani"
            class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
            >
            Kembali
        </a>
      </div>
    </div>
  </div>
@endsection