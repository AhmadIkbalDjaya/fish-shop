@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/users.css') }}">
@endpush

@section('body')
  @include('components.navbarUser')


  <!-- HOME -->
  <section class="home" id="home">
    <div class="row">
      <div class="content">
        <h3>Koi Fish Shop</h3>
        <a href="#menu" class="btn">SHOP</a>
      </div>
      <div class="image">
        <img src="{{ asset('/images/fish.png') }}" class="main-home-image" alt="" />
      </div>
    </div>

    <div class="image-slider">
      <img src="{{ asset('/images/fish.png') }}" alt="img" />
      <img src="{{ asset('/images/fish2.png') }}" alt="img" />
      <img src="{{ asset('/images/fish3.png') }}" alt="img" />
    </div>
  </section>

  <!-- ABOUT -->
  <section class="about" id="about">
    <h1 class="heading pt-5">about us <span>why choose us</span></h1>

    <div class="row">
      <div class="content">
        <h3 class="title">Koi Fish Shop!</h3>
        <p>
          Selamat datang di Penjualan Ikan Koi! Kami adalah toko online yang berdedikasi untuk menyediakan ikan
          koi berkualitas tinggi kepada para pecinta ikan hias di seluruh dunia. Dengan pengalaman yang luas dalam
          industri ini, kami bangga menjadi salah satu penyedia terpercaya ikan koi yang memenuhi standar kualitas
          tertinggi. Kami di Koi Fish Shop memahami betapa pentingnya memiliki ikan koi yang sehat dan indah
          dalam kolam atau taman Anda. Oleh karena itu, kami bekerja dengan hati-hati dalam memilih dan mengurus setiap
          ikan koi yang kami jual. Setiap ikan koi yang kami tawarkan telah melalui proses pemilihan yang ketat untuk
          memastikan bahwa mereka bebas dari penyakit dan memiliki karakteristik yang indah, seperti warna yang cerah,
          pola yang menarik, dan bentuk tubuh yang proporsional. <br> <br>
          Terima kasih telah memilih Koi Fish Shop, Penjualan Ikan Koi sebagai pilihan Anda dalam mendapatkan ikan koi
          berkualitas. Kami berharap dapat memenuhi harapan Anda dan memberikan pengalaman yang memuaskan. Jika Anda
          memiliki pertanyaan lebih lanjut atau ingin melakukan pemesanan, jangan ragu untuk menghubungi kami. Kami siap
          melayani Anda dengan sepenuh hati!
        </p>
        <div class="icons-container mb-5">
          <div class="icons">
            <img src="{{ asset('/images/icon-1.png') }}" alt="img" />
            <h3>Ikan Berkualitas</h3>
          </div>
          <div class="icons">
            <img src="{{ asset('/images/icon-2.png') }}" alt="img" />
            <h3>Cabang Kami</h3>
          </div>
          <div class="icons">
            <img src="{{ asset('/images/icon-3.png') }}" alt="img" />
            <h3>Pengiriman Gratis</h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MENU -->
  <div id="menu">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 py-5">
          <h1 class="heading py-5 text-white">MENU</h1>
        </div>
      </div>
      <div class="row">
        @foreach ($fishs as $fish)
          <div class="col-md-2 col-6 rounded-4 mb-3">
            <div class="row">
              <button data-bs-toggle="modal" data-bs-target="#fishModal{{ $fish->id }}">
                <div class="col-12 card p-3">
                  <img src="{{ asset('storage/' . $fish->image) }}" alt="img" height="200px" class="rounded-2" />
                  <p class="fs-2 fw-bold">{{ $fish->name }}</p>
                  <p class="fs-3">Rp. {{ number_format($fish->price, 0, ',', '.') }}</p>
                </div>
              </button>
            </div>
          </div>
          <!-- PRODUK -->
          <div class="modal fade" id="fishModal{{ $fish->id }}" tabindex="-1"
            aria-labelledby="fishModal{{ $fish->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title fs-3">Produk</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid pt-5 pb-3">
                    <div class="row">
                      <div class="col-md-7">
                        <img src="{{ asset('storage/' . $fish->image) }}" alt="img" height="150px" />
                      </div>
                      <div class="col-md-5">
                        <p class="fs-3 fw-bold">{{ $fish->name }}</p>
                        <p class="fs-3">Rp. {{ number_format($fish->price, 0, ',', '.') }}</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-end d-flex justify-content-end">
                        <form action="{{ route('addCart') }}" method="post">
                          @csrf
                          <input type="hidden" name="fish_id" value="{{ $fish->id }}">
                          <button type="submit" class="btn btn-secondary">+Keranjang</button>
                        </form>
                        <form action="{{ route('addCart') }}" method="post">
                          @csrf
                          <input type="hidden" name="fish_id" value="{{ $fish->id }}">
                          <input type="hidden" name="checkout" value="true">
                          <button type="submit" class="btn btn-secondary">Check Out</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>


  <!--  Keranjang Belanja -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-3">Keranjang Belanja</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            @foreach ($carts as $cart)
              <div class="row align-content-around mb-3">
                <div class="col-2 text-center">
                  <img src="{{ asset('storage/' . $cart->fish->image) }}" alt="img" height="40px" />
                </div>
                <div class="col-6 align-self-center">
                  <p class="fs-4">{{ $cart->fish->name }}</p>
                </div>
                <div class="col-3">
                  <p class="fs-3">Rp. {{ number_format($cart->fish->price, 0, ',', '.') }}</p>
                </div>
                <div class="col-1">
                  <form action="{{ route('destroyCart', ['cart' => $cart->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn-close fs-5"></button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="modal-footer">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-4">
                <p class="fs-4 fw-bold">Total</p>
              </div>
              <div class="col-4">
                <p class="fs-4 fw-bold">Rp. {{ number_format($total_price, 0, ',', '.') }}</p>
              </div>
              <div class="col-4 text-end">
                <a href="{{ route('checkout') }}">
                  <button type="button" class="btn">Check Out</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SWIPER -->
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

  @push('script')
    <script src="{{ asset('/js/script.js') }}"></script>
  @endpush
@endsection
