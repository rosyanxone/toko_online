<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Weesia - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('stylesheet/style.css') }}" rel="stylesheet" />
  </head>

  <body>
<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route( Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}" class="navbar-brand">
          <img src="{{ asset('images/logo.svg') }}" alt="logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="{{ route( Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Categories</a>
            </li>
        
            @if(Auth::user())
              @if(Auth::user()->role == 'pembeli')
                <li class="nav-item">
                  <a href="{{ route('pembeli.checkout') }}" class="nav-link" aria-current="page">Profil</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('pembeli.keranjang') }}" class="nav-link" aria-current="page">Keranjang</a>
                </li>
              @endif
            @else
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
              </li>
            @endif
            <li class="nav-item">
              @php $stat = Auth::user() ? 'logout' : 'login' @endphp
              <a class="btn btn-primary" href="{{ "/$stat" }}" class="nav-link " aria-current="page">
                  {{ ucfirst($stat) }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{ route( Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-cart">
        <div class="container">
          @if(session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
          @endif
          @if(session('del-success'))
            <div class="alert alert-danger">
                <p>{{ session('del-success') }}</p>
            </div>
          @endif

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table class="table table-borderless table-cart">
                <thead>
                  <tr>
                    <td>Gambar</td>
                    <td>Nama Produk &amp; Penjual</td>
                    <td>Jumlah Barang</td>
                    <td>Harga</td>
                    <td>Menu</td>
                  </tr>
                </thead>
                <tbody>
                @php $no = 1 @endphp
                @foreach($keranjangs as $keranjang)
                  <tr>
                    <td style="width: 20%">
                      <img
                        src="/img/products/{{ $keranjang->produk->gambar }}"
                        alt=""
                        class="cart-image "
                      />
                    </td>
                    <td td style="width: 25%">
                      <div class="product-title">{{ $keranjang->produk->nama }}</div>
                      <div class="product-subtitle">{{ $keranjang->produk->user->name }}</div>
                    </td>
                    <td td style="width: 20%">
                      <div class="product-title">{{ $keranjang->jumlah_barang }}x</div>
                    </td>
                    <td td style="width: 20%">
                      <div class="product-title">Rp.{{ $keranjang->total_harga }}</div>
                      <div class="product-subtitle">IDR</div>
                    </td>
                    <td style="width: 20%">
                      <a href="/keranjang/delete/{{ $keranjang->id }}" class="btn btn-remove-cart"> remove </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-4">Rincian pengiriman</h2>
            </div>
          </div>
          <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
            {{-- <div class="col-md-6">
              <div class="form-group">
                <label for="addressTwo">Address 2</label>
                <input
                  type="text"
                  class="form-control"
                  id="addressOne"
                  name="addressOne"
                  value="Blok B2 No. 34"
                />
              </div>
            </div> --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="Province">Provinsi</label>
                <select name="Province" id="Province" class="form-control">
                  <option value="Kalimantan Timur">Kalimantan Timur</option>
                  <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                  <option value=">Kalimantan Tengah">Kalimantan Tengah</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">Kota</label>
                <select name="city" id="city" class="form-control">
                  <option value="Samarinda">Samarinda</option>
                  <option value="Balikpapan">Balikpapan</option>
                  <option value="Bontang">Bontang</option>
                  <option value="Sangata">Sangata</option>
                  <option value="Banjarmasin">Banjarmasin</option>
                  <option value="Balangan">Balangan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="addressOne">Alamat</label>
                <input
                  type="text"
                  class="form-control"
                  id="addressOne"
                  name="addressOne"
                  value="{{ $alamat_user }}"
                />
              </div>
            </div>
            {{-- <div class="col-md-4">
              <div class="form-group">
                <label for="postalCode">Postal Code</label>
                <input
                  type="text"
                  class="form-control"
                  id="postalCode"
                  name="postalCode"
                  value="40512"
                />
              </div>
            </div> --}}
            {{-- <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country</label>
                <input
                  type="text"
                  class="form-control"
                  id="country"
                  name="country"
                  value="Indonesia "
                />
              </div>
            </div> --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="mobile">Nomor Hp</label>
                <input
                  type="text"
                  class="form-control"
                  id="mobile"
                  name="mobile"
                  value="{{ $nohp_user }}"
                />
              </div>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2 class="mb-1">Payment Information</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-3">
              <div class="product-title">{{ $total_produk }}</div>
              <div class="product-subtitle">Total Produk</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title">{{ $biaya_admin }}</div>
              <div class="product-subtitle">Pajak Admin</div>
            </div>
            <div class="col-4 col-md-3">
              <div class="product-title text-success">{{ $total_harga }}</div>
              <div class="product-subtitle">Total Harga</div>
            </div>
            <div class="col-8 col-md-3">
              <a
                href="/keranjang/checkout/{{ $id_user }}"
                class="btn btn-success mt-4 px-4 btn-block"
                >Checkout Now</a
              >
            </div>
          </div>
        </div>
      </section>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="pt-4 pb-2">2022 Copyright Weesia. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
