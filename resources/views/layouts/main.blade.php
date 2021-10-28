<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAMILI | {{ $title }}</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/assets/css/tailwind.output.css" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />    
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="/assets/js/init-alpine.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="/assets/js/charts-lines.js" defer></script>
    <script src="/assets/js/charts-pie.js" defer></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
    @include('partial.main_landing')
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-2 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
            style="justify-content: right;"
          >
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Profile menu -->
                @include('partial.profil_menu')
            </ul>
          </div>
        </header>
        <main class="h-full overflow-y-auto">
            @yield('dashboard')
        </main>
      </div>
    </div>
  </body>
</html>