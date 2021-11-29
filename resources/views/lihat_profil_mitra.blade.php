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
              class="object-cover rounded"
              style="width:20rem;height:20rem;"
              src="/{{$data->profile_photo}}"
              alt=""
              loading="lazy"
            />
            <form action="/updatefoto" enctype="multipart/form-data" method="post">
            @csrf
            <label class="text-green-500 text-xs">
                Update Foto Profil
                <input class="form-control" type="file" name="gambar" onchange="form.submit()"/>
            </label>
            </form>
          </div>
          <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$data->nama}}</h1>
          {{-- <h3 class="text-gray-600 font-lg text-semibold leading-6">Owner at Her Company Inc.</h3> --}}
          <ul
            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            <li class="grid grid-cols-2 items-center py-3">
              <span>Status</span>
              <span class="ml-auto">
                <span
                  class="bg-green-500 shadow py-1 px-2 rounded text-white text-sm">
                  Admin
                </span>
              </span>
            </li>
            <li class="flex items-center py-3">
              <span>Member since</span>
              <span class="ml-auto">{{$data->created_at}}</span>
            </li>
          </ul>
        </div>
        <!-- End of profile card -->
      </div>
      <!-- Right Side -->
      <div class="w-full md:w-9/12 mx-2 h-64">
      @error('gambar')
        <h2 class="mb-4 mt-6 text-xl dark:text-red-400">{{ $message }}</h2>
      @enderror
        <!-- Profile tab -->
        <!-- About Section -->
        @error('success')
          <h2 class="mb-4 mt-6 text-xl text-green-700 dark:text-green-200">{{$message}}</h2>
        @enderror
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <a
            class="flex items-center justify-between p-3 mb-2 text-sm font-semibold text-white bg-green-500 rounded-md shadow-md"
          >
            <div class="flex items-center">
              <span clas="text-green-500">
                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </span>
              <span class="px-3 tracking-wide">Profil Saya</span>
            </div>
          </a>
          <div class="text-gray-700">
            <div class="grid text-sm">
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Nama</div>
                <div class="px-4 py-2">{{$data->nama}}</div>
              </div>
              {{-- <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Alamat</div>
                <div class="grid">
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Dusun</div>
                    <div class="px-4 py-2">Hadipuro</div>
                  </div>
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Desa</div>
                    <div class="px-4 py-2">Sukoharjo</div>
                  </div>
                  <div class="grid grid-cols-2"
                  style="grid-template-columns: 35% auto;">
                    <div class="px-4 py-2">Kecamatan</div>
                    <div class="px-4 py-2">Trunojoyo</div>
                  </div>
                </div>
              </div> --}}
              <div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">Email</div>
                <div class="px-4 py-2">{{$data->email}}</div>
              </div>
              {{--<div class="grid grid-cols-2"
              style="grid-template-columns: 35% auto;">
                <div class="px-4 py-2 font-semibold">No. Telepon</div>
                <div class="px-4 py-2"></div>
              </div>--}}
            </div>
          </div>
          <a href="/editprofile_mitra">
            <button
              class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
              Edit Profil
            </button>
          </a>
          </div>
        <!-- End of about section -->
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  label > input[type=file] {
    display: none;
  }
</style>
@endsection