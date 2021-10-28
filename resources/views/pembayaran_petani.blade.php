@extends('layouts.main_petani')

@section('petani')
          <div class="container px-2 mx-auto grid">
            <h2
              class="mb-4 mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tambah Data Pembayaran
            </h2>
            <div
              class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Luas Lahan(m2)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="144 m2"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Total Pembayaran</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Rp 50.000.000"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jumlah Pembayaran</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Rp 25.000.000"
                />
              </label>
              <div class="form-group py-3">
                <label class="text-sm" for="exampleFormControlFile2">Upload foto bukti Pembayaran</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile2">
              </div>
              <div class="flex item-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
                <a href="/dashboard_petani">
                  <button
                    class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                  >
                    Kembali
                  </button>
                </a>
                <a href="/dashboard_petani">
                  <button
                    class="px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                    type="button"
                  >
                    Simpan
                  </button>
                </a>
              </div>
            </div>
          </div>
@endsection