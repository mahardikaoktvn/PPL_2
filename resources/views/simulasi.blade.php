@extends('layouts.main_petani')

@section('petani')
    
<div class="bg-gray-50">
  <div class="container mx-auto p-3">
    <h2 class="text-bold text-2xl mb-4">
      Simulasi Kerjasama
    </h2>
    <div class="md:flex no-wrap">
      <div class="w-full md:w-9/12 mx-2 h-64">
        <div class="bg-white p-3 shadow-sm rounded-sm">
          <div class="text-gray-700">
            <div class="grid text-sm">
              <div class="grid grid-cols-2"
              style="grid-template-columns: 15% auto;">
                <div class="px-4 py-2 font-semibold">Luas Lahan</div>
                <div class="px-4 py-2"><span>: </span>{{$luas}} meter persegi</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 15% auto;">
                <div class="px-4 py-2 font-semibold">Jumlah Bibit</div>
                <div class="px-4 py-2"><span>: </span>{{$bibit}}</div>
              </div>
              <div class="grid grid-cols-2"
              style="grid-template-columns: 15% auto;">
                <div class="px-4 py-2 font-semibold">Modal Biaya</div>
                <div class="px-4 py-2"><span>: </span> Rp {{$modal}}</div>
              </div>
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
                      <th class="px-2 py-2 text-medium text-sm">Panen Ke</th>
                      <th class="px-2 py-2 text-medium text-sm">Berat Panen basah(Kg)</th>
                      <th class="px-2 py-2 text-medium text-sm">Bagi Hasil(Petani)</th>
                      <th class="px-2 py-2 text-medium text-sm">Bagi Hasil(Mitra)</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-2 py-2 text-sm">
                        1
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$pred1}} kg
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$bghslpetani1}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$bghslmitra1}}
                      </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-2 py-2 text-sm">
                        2
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$pred2}} kg
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$bghslpetani2}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$bghslmitra2}}
                      </td>
                    </tr>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-2 py-2 text-sm">
                        3
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$pred3}} kg
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$bghslpetani3}}
                      </td>
                      <td class="px-2 py-2 text-sm">
                        {{$bghslmitra3}}
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="flex mt-3 item-center justify-end space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row">
              <a href="/"
                  class="px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                  >
                  Kembali
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection