@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/form_add.css') }}">
@endpush

@section('body')
  @include('components.navbar')
  @include('components.spasi')

  <section id="header-tambahProduk">
    <div class="container-fluid card shadow-lg">
      <div class="row mt-3">
        <div class="col-2">
          <a href="{{ route('admin.fish.index') }}"><button type="button" class="btn btn-primary"><i
                class="bi bi-arrow-left-circle"></i></button></a>
        </div>
        <div class="col-12 text-center">
          <h3>Tambah Produk</h3>
          <p>Tambahkan Produk pada colom dibawah</p>
        </div>
      </div>
    </div>
  </section>

  <section id="addProduk">
    <div class="container-fluid">
      <div class="row m-4 justify-content-center">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="login-box">
              <form action="{{ route('admin.fish.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="mb-4 text-center">Produk</h4>
                <div class="user-box">
                  <input type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old("name") }}" required="" />
                  <label class="text-black">Nama Produk</label>
                  @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="user-box">
                  <input type="number" name="price" class="@error('price') is-invalid @enderror" value="{{ old("price") }}" required="" min="0"/>
                  <label class="text-black">Harga Produk</label>
                  @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Masukkan foto produk</label>
                  <input type="file" name="image" id="formFile" class="form-control @error('image') is-invalid @enderror" value="{{ old("image") }}" required/>
                  @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row text-center my-4">
                  <div class="col-md-12">
                    <div class="login-box">
                      <button type="submit" class="card">
                        Tambah
                        <span></span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
