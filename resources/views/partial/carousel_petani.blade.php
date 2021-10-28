    <section class="slider_section">
      <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1" class=""></li>
          <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="./assets/img/coursel-1.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption relative">
                <h1>Peluang Bisnis</h1>
                <span>Budidaya Komoditas Vanili</span>

                <p>Vanili termasuk ke dalam tujuh komoditas perkebunan yang saat ini memiliki potensi untuk peningkatan ekspor.</p>
                @if($auth == 'guest') 
                  <a class="mt-8 buynow" href="/tambah_pengajuan_petani">Kerjasama</a>
                  @else
                  @if($auth -> id_account_verify == "0")
                  <a class="mt-8 buynow" href="/" onclick="return confirm('Akun belum diverifikasi! Harap menunggu verifikasi dari admin. Untuk melakukan pengecekan status akun, klik foto profil anda.')">Kerjasama</a>
                  @elseif($auth -> id_account_verify == "2")
                  <a class="mt-8 buynow" href="/tambah_pengajuan_petani">Kerjasama</a>
                  @elseif($auth -> id_account_verify == "1")
                  <a class="mt-8 buynow" href="/" onclick="return confirm('Akun anda ditolak. Harap daftar kembali dengan data asli anda.')">Kerjasama</a>
                  @endif
                @endif
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="./assets/img/coursel-2.png" alt="Second slide">
            <div class="container">
              <div class="carousel-caption relative">
                <h1>Peluang Bisnis</h1>
                <span>Budidaya Komoditas Vanili</span>

                <p>Harga vanili yang sangat potensial di pasar internasional.</p>
                @if($auth == 'guest') 
                  <a class="mt-8 buynow" href="/tambah_pengajuan_petani">Kerjasama</a>
                  @else
                  @if($auth -> id_account_verify == "0")
                  <a class="mt-8 buynow" href="/" onclick="return confirm('Akun belum diverifikasi! Harap menunggu verifikasi dari admin. Untuk melakukan pengecekan status akun, klik foto profil anda.')">Kerjasama</a>
                  @elseif($auth -> id_account_verify == "2")
                  <a class="mt-8 buynow" href="/tambah_pengajuan_petani">Kerjasama</a>
                  @elseif($auth -> id_account_verify == "1")
                  <a class="mt-8 buynow" href="/" onclick="return confirm('Akun anda ditolak. Harap daftar kembali dengan data asli anda.')">Kerjasama</a>
                  @endif
                @endif
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <img class="third-slide" src="./assets/img/coursel-3.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption relative">
                <h1>Peluang Bisnis</h1>
                <span>Budidaya Komoditas Vanili</span>

                <p>Vanili merupakan tanaman tropis sehingga cocok ditanam di Indonesia.</p>
                @if($auth == 'guest') 
                  <a class="mt-8 buynow" href="/tambah_pengajuan_petani">Kerjasama</a>
                  @else
                  @if($auth -> id_account_verify == "0")
                  <a class="mt-8 buynow" href="/" onclick="return confirm('Akun belum diverifikasi! Harap menunggu verifikasi dari admin. Untuk melakukan pengecekan status akun, klik foto profil anda.')">Kerjasama</a>
                  @elseif($auth -> id_account_verify == "2")
                  <a class="mt-8 buynow" href="/tambah_pengajuan_petani">Kerjasama</a>
                  @elseif($auth -> id_account_verify == "1")
                  <a class="mt-8 buynow" href="/" onclick="return confirm('Akun anda ditolak. Harap daftar kembali dengan data asli anda.')">Kerjasama</a>
                  @endif
                @endif
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <i class='fa fa-angle-left'></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <i class='fa fa-angle-right'></i>
        </a>
      </div>
    </section>