@extends('layouts.auth')

@section('halaman_awal')
  <div class="flex flex-col overflow-y-auto md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
      <img
        aria-hidden="true"
        class="object-cover w-full h-full dark:hidden"
        src="../assets/img/login-office.jpeg"
        alt="Office"
      />
      <img
        aria-hidden="true"
        class="hidden object-cover w-full h-full dark:block"
        src="../assets/img/login-office-dark.jpeg"
        alt="Office"
      />
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
      <div class="w-full">
        <h1
          class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Login
        </h1>
        @error('msg')
          <h2 class="mb-4 mt-6 text-sm text-red-700 dark:text-red-200">{{$message}}</h2>
        @enderror
        @error('success')
          <h2 class="mb-4 mt-6 text-xl text-green-700 dark:text-green-200">{{$message}}</h2>
        @enderror
        <form method="POST" action="{{ route('proses_login') }}">
            @csrf
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Email</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-500 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Jane@email.com"
            id="email"
            type="email"
            name="email"
            :value="old('email')" required
          />
          @error('email')
            <h2 class="text-red-700 dark:text-red-400">{{ $message }}</h2>
          @enderror
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Password</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-500 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="***************"
            type="password"
            id="password"
            type="password"
            name="password"
            required
          />
          @error('password')
            <h2 class="text-red-700 dark:text-red-400">{{ $message }}</h2>
          @enderror
        </label>

        <!-- You should use a button here, as the anchor is only used for the example  -->
        <button
          class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-teal-500 border border-transparent rounded-lg active:bg-teal-500 hover:bg-teal-600 focus:outline-none focus:shadow-outline-green"
          href="/"
        >
          {{ __('Log in') }}
        </button>
        </form>
        <hr class="my-8" />
        <p class="mt-1">
          <a
            class="text-sm font-medium text-green-500 dark:text-green-500 hover:underline"
            href="/register"
          >
            Buat Akun
          </a>
        </p>
      </div>
    </div>
  </div>
@endsection
