<header>
    <div class="header">
      <div class="container">
        <div class="item-center row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section">
            <div class="full">
              <div class="center-desk">
                <div class="logo">
                  <a href="/">
                    <h1 class="ml-4 mt-2 text-white text-3xl font-bold">F A M I L I</h1>
                    {{-- <img src="./assets/img/logo-1.png" alt="Logo" width="50"> --}}
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
            <nav class="main-menu">
              <ul class="item-start menu-area-main">
                {{-- <li class="active"> <a href="/petani/dashboard_petani">Dashboard</a> </li> --}}
                <li> <a href="/dashboard">Beranda</a> </li>
                <li> <a href="/about">Tentang Kami</a> </li>
                @if (Auth::check())
                  <li class="flex">
                    <a href="/profile">
                      <img
                        class="object-cover w-12 h-12 rounded-full shadow-lg"
                        src="/{{Auth::user()->profile_photo}}"
                        alt=""
                        loading="lazy"
                      />
                    </a>
                  </li>
                @else
                <li> <a href="/login">Masuk</a> </li>
                @endif
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>