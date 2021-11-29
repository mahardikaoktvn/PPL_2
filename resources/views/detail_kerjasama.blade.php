@extends('layouts.main')

@section('dashboard')

<style>
  :root {
    --main-color: #4a76a8;
  }

  .bg-main-color {
    background-color: var(--main-color);
  }

  .text-main-color {
    color: var(--main-color);
  }

  .border-main-color {
    border-color: var(--main-color);
  }
</style>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="bg-gray-100">
  <div class="container mx-auto my-5 p-5">
    <div class="md:flex no-wrap md:-mx-2 ">
      <!-- Left Side -->
      <div class="w-full md:w-4/12 md:mx-2">
        <!-- Profile Card -->
        <div class="bg-white p-3 border-t-4 border-green-400">
          <div class="image overflow-hidden">
            <img
              class="object-cover w-full h-full rounded"
              src="/{{$orang -> profile_photo}}"
              alt=""
              loading="lazy"
            />
          </div>
          <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$orang -> nama}}</h1>
          {{-- <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner at Her Company Inc.</h3> --}}
          <ul
            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            <li class="flex items-center py-3">
              <span>Status</span>
              <span class="ml-auto">
                <span
                  class="font-medium bg-green-500 shadow py-1 px-2 rounded text-white text-sm">
                  Disetujui
                </span>
                {{-- <span
                  class="font-medium bg-green-500 shadow py-1 px-2 rounded text-white text-sm">
                  Di Setujui
                </span> --}}
                {{-- <span
                  class="font-medium bg-red-600 shadow py-1 px-2 rounded text-white text-sm">
                  Di Tolak
                </span> --}}
              </span>
            </li>
            <li class="flex items-center py-3">
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-fill" viewBox="0 0 16 16">
                  <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                </svg>
                {{-- <span>Member since</span> --}}
              </div>
              <span class="ml-auto">{{$data -> updated_at}}</span>
            </li>
          </ul>
        </div>
        <!-- End of profile card -->
      </div>
      <!-- Right Side -->
      <div class="w-full md:w-9/12 mx-2 h-64">
        @error('success')
          <h2 class="mb-4 mt-6 text-xl text-green-700 dark:text-green-200">{{$message}}</h2>
        @enderror
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <a
            class="flex items-center justify-between p-3 mb-5 text-sm font-semibold text-white bg-green-500 rounded-md shadow-md"
          >
            <div class="flex items-center">
              <span clas="text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
              </span>
              <span class="px-3 tracking-wide">Data Lahan</span>
            </div>
          </a>
          <div class="text-gray-700">
            <div class="grid text-sm">
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Kecamatan Lokasi Lahan</div>
                <div class="px-4 py-2">{{$kec -> kecamatan}}</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Desa Lokasi Lahan</div>
                <div class="px-4 py-2">{{$desa -> desa}}</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Alamat Lokasi Lahan</div>
                <div class="px-4 py-2">{{$data -> lokasi_lahan}}</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Tanggal Penanaman</div>
                <div class="px-4 py-2">{{$data -> tanggal_tanam}}</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Luas Lahan</div>
                <div class="px-4 py-2">{{$data -> luas_lahan}} meter persegi</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Foto Lahan</div>
                <div class="px-4 grid">
                  <img
                    class="object-cover"
                    src="/{{$data -> foto_bukti_lahan}}"
                    alt=""
                    width="200"
                    loading="lazy"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <div
            class="flex items-center justify-between p-2 px-4 py-1 mb-5 text-sm font-semibold text-white bg-green-500 rounded-md shadow-md">
            <div class="flex items-center">
              <span clas="text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
              </span>
              <span class="px-3 tracking-wide">Pembayaran</span>
            </div>
            {{-- <a href="/detail_kerjasama_hasilpanen">
              <button
                class="items-end px-1 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-white hover:text-green-500 focus:outline-none focus:shadow-outline-white"
               ><i class="icon-copy fa fa-plus" style="padding-left: 0.3rem; padding-right:0.5rem" aria-hidden="true"></i>
                Upload Bukti Pembayaran
              </button>
            </a> --}}
          </div>
          <div class="text-gray-700">
            <div class="grid text-sm">
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Total Pembayaran</div>
                <div class="px-4 py-2">Rp 50.000.000</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Uang Muka</div>
                <div class="grid">
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Jumlah Pembayaran</div>
                    <div class="px-4 py-2">Rp 25.000.000</div>
                  </div>
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Status Pembayaran</div>
                    <div class="px-4 py-2">Belum Lunas</div>
                  </div>
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Bukti Pembayaran</div>
                    {{-- <div class="px-4 grid">
                      <img
                        class="object-cover"
                        src="./assets/img/lahan-2.jpg"
                        alt=""
                        width="200"
                        loading="lazy"
                      />
                    </div> --}}
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Pelunasan</div>
                <div class="grid">
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Jumlah Pembayaran</div>
                    <div class="px-4 py-2">Rp 25.000.000</div>
                  </div>
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Status Pembayaran</div>
                    <div class="px-4 py-2">Belum Lunas</div>
                  </div>
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Bukti Pembayaran</div>
                    {{-- <div class="px-4 grid">
                      <img
                        class="object-cover"
                        src="./assets/img/lahan-2.jpg"
                        alt=""
                        width="200"
                        loading="lazy"
                      />
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <div
            class="flex items-center justify-between p-2 py-1 mb-5 text-sm font-semibold text-white bg-green-500 rounded-md shadow-md">
            <div class="flex items-center">
              <span clas="text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
              </span>
              <span class="px-3 tracking-wide">Hasil Panen</span>
            </div>
            <a href="/detail_kerjasama_hasilpanen/{{$data -> id_lahan}}">
              <button
                class="items-end px-1 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-white hover:text-green-500 focus:outline-none focus:shadow-outline-white"
               ><i class="icon-copy fa fa-plus" style="padding-left: 0.3rem; padding-right:0.5rem" aria-hidden="true"></i>
                Tambah Data
              </button>
            </a>
          </div>
          <div class="text-gray-700">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                <tr
                      class="tracking-wide text-left text-gray-700 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-2 py-2 text-medium text-sm">Panen Ke</th>
                      <th class="px-2 py-2 text-medium text-sm">Tanggal Pemanenan</th>
                      <th class="px-2 py-2 text-medium text-sm">Hasil(kg)</th>
                      <th class="px-2 py-2 text-medium text-sm">Kualitas Mutu</th>
                      <th class="px-2 py-2 text-medium text-sm"></th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    <tr class="text-gray-700 dark:text-gray-400">
                      @foreach($panen as $panen)
                      <td class="px-2 py-2 text-sm">
                        {{$panen -> panen_ke}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$panen -> tanggal_panen}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                      {{$panen -> hasil_panen}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                      {{$panen -> kualitas_mutu}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                        <div class="flex justify-end" style="margin-left: -80px; margin-right:20px;">
                          <a class="px-2" href="/edit_hasil_panen/{{$panen -> id_panen}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                          </a>
                          <a class="px-2" href="/lihat_hasil_panen/{{$panen -> id_panen}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
                          </a>
                          <a class="px-2" href="/hapus_hasil_panen/{{$panen -> id_panen}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg> 
                          </a>
                        </div>
                      </td>
                      @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
              @include('partial.pagination')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection