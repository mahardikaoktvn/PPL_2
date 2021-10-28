@extends('layouts.main')

@section('dashboard')
          <div class="container px-6 mx-auto grid">
            <h2
              class="mb-4 mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tambah Data Hasil Panen
            </h2>
            <div
              class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <form action="/tambah_hasilpanen" enctype='multipart/form-data' method="post">
            @csrf
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Panenan Petani</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="1"
                  name="panen_ke"
                  required
                />
              </label>
              <input type="hidden" name="id_lahan" value="{{$lahan -> id_lahan}}">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Panen</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="date"
                  name="tanggal_panen"
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Hasil Panen(Kg)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="50"
                  name="hasil_panen"
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Penjualan</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="date"
                  name="tanggal_penjualan"
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Hasil Penjualan(Rp)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="3000000"
                  name="hasil_penjualan"
                  required
                />
              </label>
              <div class="form-group py-3">
                <label class="text-sm" for="exampleFormControlFile2">Upload file bukti penjualan</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile2" name="foto_bukti_penjualan" required>
              </div>
            </div>
            <footer
              class="flex items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
            >
              <a href="/detail_kerjasama/{{$lahan -> id_lahan}}">
                <button
                  class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                >
                  Kembali
                </button>
              </a>
                <button
                  class="px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                  type="submit"
                >
                  Tambah
                </button>
            </footer>
            </form>
          </div>
@endsection