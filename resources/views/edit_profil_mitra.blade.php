@extends('layouts.main')

@section('dashboard')
          <div class="container px-2 mx-auto grid">
            <h2
              class="mb-4 mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Edit Profil
            </h2>
            <form method="POST" enctype='multipart/form-data' action="/editprofile_mitra">
            @csrf
            <div
              class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  value="{{$data->nama}}"
                  name="nama"
                  id="nama"
                />
                @error('nama')
                  <span class="text-red-700 dark:text-red-400">{{ $message }}</span>
                @enderror
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  value="{{$data->email}}"
                  name="email"
                />
                @error('email')
                  <span class="text-red-700 dark:text-red-400">{{ $message }}</span>
                @enderror
              </label>
              {{--<label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">No Telepon</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="00089888"
                />
              </label>--}}
              <div class="flex mt-3 item-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                <a href="/profile_mitra">
                  <button
                    class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                  >
                    Kembali
                  </button>
                </a>
                <a>
                  <button
                    class="px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                    type="submit"
                  >
                    Simpan
                  </button>
                </a>
              </form>
              </div>
            </div>
          </div>
@endsection