@extends('layouts.main_petani')

@section('petani')
          <div class="container px-2 mx-auto grid">
            <h2
              class="mb-4 mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tambah Data Pengajuan
            </h2>
            <form method="POST" enctype='multipart/form-data' action="/ajukan">
            @csrf
            <div
              class="px-4 py-3 mt-4 mb-8 bg-gray-100 rounded-lg shadow-md dark:bg-gray-600"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Luas Lahan(m2)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="144 m2"
                  name="luas_lahan"
                  id="luas_lahan"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Alamat Lokasi Lahan</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jl. Raden Rahmad, Dusun Mengkubuwono, RT 003/ RW 005"
                  name="lokasi_lahan"
                  id="lokasi_lahan"
                />
              </label>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Kecamatan Lokasi Lahan
                </span>
                <div class="grid mt-3 mb-3 xl:grid-cols-3" style="grid-template-columns: repeat(5,minmax(0,1fr)); gap:.5rem">
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="personal"
                    />
                    <span class="ml-2">Kecamatan 1</span>
                  </label>
                  {{-- <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Kecamatan 2</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Kecamatan 3</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Kecamatan 4</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Kecamatan 5</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Kecamatan 6</span>
                  </label> --}}
                </div>
                {{-- <label class="block text-sm">
                  <select
                    class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  >
                    <option value="1">Opsi 1</option>
                    <option value="1">Opsi 2</option>
                  </select>
                </label>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Desa Lokasi Lahan
                  </span>
                  <select
                    class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  >
                    <option>Opsi 1</option>
                  </select>
                </label> --}}
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Desa Lokasi Lahan
                </span>
                <div class="grid mt-3 mb-3 xl:grid-cols-3" style="grid-template-columns: repeat(5,minmax(0,1fr)); gap:.5rem">
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="personal"
                    />
                    <span class="ml-2">Desa 1</span>
                  </label>
                  {{-- <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Desa 2</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Desa 3</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Desa 4</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Desa 5</span>
                  </label>
                  <label
                    class="flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="ml-2 text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="accountType"
                      value="busines"
                    />
                    <span class="ml-2">Desa 6</span>
                  </label> --}}
                </div>
                {{-- <label class="block text-sm">
                  <select
                    class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  >
                    <option value="1">Opsi 1</option>
                    <option value="1">Opsi 2</option>
                  </select>
                </label>
                <label class="block text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                    Desa Lokasi Lahan
                  </span>
                  <select
                    class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  >
                    <option>Opsi 1</option>
                  </select>
                </label> --}}
              </div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Penanaman</span>
                <input
                  type="datetime-local"
                  class="block w-full mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="12/10/2020"
                  name="tanggal_tanam"
                  id="tanggal_tanam"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jumlah Bibit</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="100"
                  name="jumlah_bibit"
                  id="jumlah_bibit"
                />
              </label>
              <div class="form-group py-3">
                <label class="text-sm" for="exampleFormControlFile2">Upload foto bukti Lahan</label>
                <input name="foto_bukti_lahan" id="foto_bukti_lahan" type="file" class="form-control-file" id="exampleFormControlFile2">
              </div>
              <div class="form-group py-3">
                <label class="text-sm" for="exampleFormControlFile2">Upload file MOU (format docx/doc/pdf)</label>
                <input name="dokumen_mou" id="dokumen_mou" type="file" class="form-control-file" id="exampleFormControlFile2">
              </div>
              <div class="flex item-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                <a href="/"
                    class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                    >
                    Kembali
                </a>
                <a>
                  <button
                    class="px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                    type="submit"
                  >
                    Ajukan
                  </button>
                </a>
              </div>
            </div>
          </div>
@endsection