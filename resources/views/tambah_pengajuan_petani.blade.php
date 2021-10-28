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
              class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Luas Lahan(m2)</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="144 m2"
                  name="luas_lahan"
                  id="luas_lahan"
                  required
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Alamat Lokasi Lahan</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jl. Raden Rahmad, Dusun Mengkubuwono, RT 003/ RW 005"
                  name="lokasi_lahan"
                  id="lokasi_lahan"
                  required
                />
              </label>
              <div class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Kecamatan Lokasi Lahan
                </span>
                <div class="mb-3">
                  <label for="kecamatan" class="form-label"></label>
                  <select class="form-control" name="kecamatan" id="kecamatan" required>
                  @foreach($kecamatan as $kcm)
                  <option value="{{$kcm -> id_kecamatan}}">
                    {{$kcm-> kecamatan}}
                  </option>
                  @endforeach
                  </select>
                </div>
              <div class="mb-3">
                <label for="desa" class="form-label">Desa</label>
                <select class="form-control" name="id_desa" id="id_desa"></select>
              </div>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Penanaman</span>
                <input
                  type="date"
                  class="block w-full mt-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
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
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          <script>
            $(document).ready(function() {
            $('#kecamatan').on('click', function() {
               var id_kecamatan = $(this).val();
               if(id_kecamatan) {
                   $.ajax({
                       url: '/getDesa/'+id_kecamatan,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#id_desa').empty();
                            $('#id_desa').append('<option hidden>Pilih Desa</option>'); 
                            $.each(data, function(id_desa, desa){
                                $('select[name="id_desa"]').append('<option value="'+ desa.id_desa +'">' + desa.desa+ '</option>');
                            });
                        }else{
                            $('#id_desa').empty();
                        }
                     }
                   });
               }else{
                 $('#desa').empty();
               }
            });
            });
        </script>
@endsection