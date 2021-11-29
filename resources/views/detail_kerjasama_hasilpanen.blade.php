@extends('layouts.main')

@section('dashboard')
          <div class="container px-6 mx-auto grid">
            <h2
              class="mb-4 mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tambah Data Hasil Panen
            </h2>
            @if($errors->any())
              <h2 class="mb-4 mt-6 text-xl font-semibold text-red-700 dark:text-red-200">{{$errors->first()}}</h2>
            @endif
            <div
              class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            @if($data)
            <form action="/edit_hasilpanen/{{$data->id_panen}}" method="post">
            @csrf
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Panenan Petani</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="1"
                  name="panen_ke"
                  value="{{$data->panen_ke}}"
                  required
                />
                @error('panen_ke')
                  <h2 class="text-red-700 dark:text-red-400">{{ $message }}</h2>
                @enderror
              </label>
              <input type="hidden" name="id_lahan" value="{{$lahan -> id_lahan}}">
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Panen</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  type="date"
                  name="tanggal_panen"
                  value="{{$data->tanggal_panen}}"
                  id="txtDate"
                  required
                />
                @error('tanggal_panen')
                  <h2 class="text-red-700 dark:text-red-400">{{ $message }}</h2>
                @enderror
              </label>
                <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Hasil (Kg)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="50"
                  name="hasil_panen"
                  value="{{$data->hasil_panen}}"
                  required
                />
                @error('hasil_panen')
                  <h2 class="text-red-700 dark:text-red-400">{{ $message }}</h2>
                @enderror
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pengeluaran</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="30.000.000"
                  name="biaya_panen"
                  value="{{$data->biaya_panen}}"
                  required
                />
                @error('biaya_panen')
                  <h2 class="text-red-700 dark:text-red-400">{{ $message }}</h2>
                @enderror
              </label>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Umur Petik (bulan)
                </span>
                <div class="mb-3">
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="umur_petik" id=" " required>
                  @if($data->umur_petik =="2-4")
                  <option value="2-4">
                    2-4
                  </option>
                  <option value="4-6">
                    4-6
                  </option>
                  <option value="6-8">
                    6-8
                  </option>
                  @elseif($data->umur_petik =="4-6")
                  <option value="4-6">
                    4-6
                  </option>
                  <option value="6-8">
                    6-8
                  </option>
                  <option value="2-4">
                    2-4
                  </option>
                  @elseif($data->umur_petik =="6-8")
                  <option value="6-8">
                    6-8
                  </option>
                  <option value="2-4">
                    2-4
                  </option>
                  <option value="4-6">
                    4-6
                  </option>
                  @endif
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Panjang Buah (cm)
                </span>
                <div class="mb-3">
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="panjang_buah" id=" " required>
                  @if($data->panjang_buah == "max 17")
                  <option value="max 17">
                    Max 17 cm
                  </option>
                  <option value="min 18">
                    Min 18 cm
                  </option>
                  @else
                  <option value="min 18">
                    Min 18 cm
                  </option>
                  <option value="max 17">
                    Max 17 cm
                  </option>
                  @endif
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Diameter Buah (cm)
                </span>
                <div class="mb-3">
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="diameter_buah" id=" " required>
                  @if($data -> diameter_buah == "<1")
                  <option value="<1">
                    Kurang dari 1 cm
                  </option>
                  <option value=">1">
                    Lebih dari 1 cm
                  </option>
                  @else
                  <option value="<1">
                    Kurang dari 1 cm
                  </option>
                  <option value=">1">
                    Lebih dari 1 cm
                  </option>
                  @endif
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Warna
                </span>
                <div class="mb-3">
                  <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="warna" id=" " required>
                  @if($data->warna == "Kuning kecoklatan")
                  <option value="Kuning kecoklatan">
                  Kuning kecoklatan
                  </option>
                  <option value="Hijau kusam">
                  Hijau kusam
                  </option>
                  <option value="Hijau mengkilat">
                  Hijau mengkilat
                  </option>
                  @elseif($data->warna == "Hijau kusam")
                  <option value="Hijau kusam">
                  Hijau kusam
                  </option>
                  <option value="Kuning kecoklatan">
                  Kuning kecoklatan
                  </option>
                  <option value="Hijau mengkilat">
                  Hijau mengkilat
                  </option>
                  @else
                  <option value="Hijau mengkilat">
                  Hijau mengkilat
                  </option>
                  <option value="Hijau kusam">
                  Hijau kusam
                  </option>
                  <option value="Kuning kecoklatan">
                  Kuning kecoklatan
                  </option>
                  @endif
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Tingkat Rendemen Kering (%)
                </span>
                <div class="mb-3">
                  <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="rendemen" id=" " required>
                  @if($data->rendemen == "4-8")
                  <option value="4-8">
                    4-8
                  </option>
                  <option value="9-13">
                    9-13
                  </option>
                  <option value="14-19">
                    14-19
                  </option>
                  @elseif($data->rendemen == "9-13")
                  <option value="9-13">
                    9-13
                  </option>
                  <option value="14-19">
                    14-19
                  </option>
                  <option value="4-8">
                    4-8
                  </option>
                  @elseif($data->rendemen == "14-19")
                  <option value="14-19">
                    14-19
                  </option>
                  <option value="4-8">
                    4-8
                  </option>
                  <option value="9-13">
                    9-13
                  </option>
                  @endif
                  </select>
                </div>
              </div>
            <footer
              class="flex items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
            >
              <a class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" href="/detail_kerjasama/{{$lahan -> id_lahan}}">
                  Kembali
              </a>
                <button
                  class="px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                  type="submit"
                >
                  Update
                </button>
            </footer>
            </form>
            @else
            <form action="/tambah_hasilpanen" method="post">
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
                  id="txtDate"
                  required
                />
                <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Hasil (Kg)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="50"
                  name="hasil_panen"
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pengeluaran</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="30.000.000"
                  name="biaya_panen"
                  required
                />
              </label>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Umur Petik (bulan)
                </span>
                <div class="mb-3">
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="umur_petik" id=" " required>
                  <option value="2-4">
                    2-4
                  </option>
                  <option value="4-6">
                    4-6
                  </option>
                  <option value="6-8">
                    6-8
                  </option>
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Panjang Buah (cm)
                </span>
                <div class="mb-3">
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="panjang_buah" id=" " required>
                  <option value="max 17">
                    Max 17 cm
                  </option>
                  <option value="min 18">
                    Min 18 cm
                  </option>
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Diameter Buah (cm)
                </span>
                <div class="mb-3">
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="diameter_buah" id=" " required>
                  <option value="<1">
                    Kurang dari 1 cm
                  </option>
                  <option value=">1">
                    Lebih dari 1 cm
                  </option>
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Warna
                </span>
                <div class="mb-3">
                  <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="warna" id=" " required>
                  <option value="Kuning kecoklatan">
                  Kuning kecoklatan
                  </option>
                  <option value="Hijau kusam">
                  Hijau kusam
                  </option>
                  <option value="Hijau mengkilat">
                  Hijau mengkilat
                  </option>
                  </select>
                </div>
              </div>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Tingkat Rendemen Kering (%)
                </span>
                <div class="mb-3">
                  <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="rendemen" id=" " required>
                  <option value="4-8">
                    4-8
                  </option>
                  <option value="9-13">
                    9-13
                  </option>
                  <option value="14-19">
                    14-19
                  </option>
                  </select>
                </div>
              </div>
            <footer
              class="flex items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800"
            >
              <a class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" href="/detail_kerjasama/{{$lahan -> id_lahan}}">
                  Kembali
              </a>
                <button
                  class="px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-lg active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                  type="submit"
                >
                  Tambah
                </button>
            </footer>
            </form>
            @endif
          </div>
@endsection