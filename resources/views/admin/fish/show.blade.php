@extends('layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('/css/form_add.css') }}">
@endpush

@section('body')
  @include('components.navbar')
  @include('components.spasi')

  <section id="header-informasi">
    <div class="container">
      <div class="row shadow p-3">
        <div class="col-12 text-center col-md-1">
          <div><img src="{{ asset('storage/'.$fish->image) }}" class="rounded-3" alt="img" height="100px" /></div>
        </div>
        <div class="col-md-11 text-center">
          <div class="container h-100">
            <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h3>Informasi Produk</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="informasi">
    <div class="container">
      <div class="row card shadow p-4 mt-3">
        <div class="col-md-12">
          <h4 class="card-header">Informasi</h4>
          <div class="card-body">
            <div class="col-12 col-md-4">
              <table class="table table-borderless table-responsive">
                <tbody>
                  <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td>{{ $fish->name }}</td>
                  </tr>
                  <tr>
                    <td>Harga Produk</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($fish->price, 0, ',', '.') }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-primary"
              style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem"><a
                href="{{ route('admin.fish.index') }}">Back</a></button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
