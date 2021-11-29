@extends('layouts.main')

@section('dashboard')    
  <div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Verifikasi Akun
    </h2>
    <div class="w-full overflow-hidden rounded-lg">
      <div class="w-full overflow-x-auto">
        <div class="grid mb-8 xl:grid-cols-3" style="gap: 0.5rem;">
          <!-- Card -->
          @foreach($data as $data)
          <div
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <div
              class="relative hidden h-12 w-12 mr-6 rounded-full md:block"
            >
              <img
                class="object-cover w-full h-full rounded-full"
                src="{{$data -> profile_photo}}"
                alt=""
                loading="lazy"
              />
              <div
                class="absolute inset-0 rounded-full shadow-inner"
                aria-hidden="true"
              ></div>
            </div>
            <div>
              <p
                class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200"
              >
                {{$data -> nama}}
              </p>
            </div>
            <div
              class="text-gray-500 focus-within:text-green-500" style="margin-left: auto"
            >
              <a href="/{{$data->id}}">
                <button
                  class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-500 border border-transparent rounded-md active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
                >
                  Lihat Detail
                </button>
              </a>
            </div> 
          </div> 
          @endforeach
        </div>      
      </div>
    </div>
  </div>
@endsection