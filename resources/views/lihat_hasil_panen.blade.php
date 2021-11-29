@extends('layouts.main')

@section('dashboard')    
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
            {{$bgptn}}
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
            {{$bgmtr}}
          </p>
        </div>
      </div>
    </div>
    <div class="w-full md:w-9/12 mx-2 h-64">
      <div class="bg-white p-3 shadow-sm rounded-sm">
        @error('success')
          <h2 class="mb-4 mt-1 text-xl text-green-700 dark:text-green-200">{{$message}}</h2>
        @enderror
        <div
          class="flex items-center justify-between p-2 py-1 mb-5 text-sm font-semibold text-white bg-green-500 rounded-md shadow-md">
          <div class="flex items-center">
            <span clas="text-green-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </span>
            <span class="px-3 tracking-wide">Hasil Pembayaran</span>
          </div>
          <a href="/detail_pembayaran/{{$data -> id_panen}}">
            <button
              class="items-end px-1 py-2 text-sm font-medium leading-5 text-black transition-colors duration-150 bg-white border border-transparent rounded-md"
              ><i class="icon-copy fa fa-plus" style="padding-left: 0.3rem; padding-right:0.5rem" aria-hidden="true"></i>
              Tambah Data
            </button>
          </a>
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
                    <th class="px-2 py-2 text-medium text-sm"></th>
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
                    <td class="px-2 py-2 text-sm">
                      <div class="flex justify-end" style="margin-left: -100px; margin-right: 30px;">
                        <a class="px-2" href="/edit_pembayaran/{{$pjl -> id_pembayaran}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                        </a>
                        <a class="px-2" href="/delete_pembayaran/{{$pjl -> id_pembayaran}}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg> 
                        </a>
                      </div>
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
    </div>
  </div>
@endsection