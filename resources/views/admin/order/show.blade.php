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
          <div><img src="{{ asset('/images/baground.jpg') }}" class="rounded-3" alt="img" height="100px" /></div>
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
            <div class="col-12 col-md-6">
              <table class="table table-borderless table-responsive">
                <p><strong>Pembeli :</strong></p>
                <tbody>
                  <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td>{{ $order->name }}</td>
                  </tr>
                  <tr>
                    <td>Nomor HP</td>
                    <td>:</td>
                    <td>{{ $order->phone }}</td>
                  </tr>
                  <tr>
                    <td>Alamat Pemesan</td>
                    <td>:</td>
                    <td>{{ $order->address }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Beli</td>
                    <td>:</td>
                    <td>{{ count($order->fishs_id) }}</td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-borderless table-responsive">
                <p class="pt-3"><strong>Produk :</strong></p>
                <tbody>
                  @foreach ($order->fishs_id as $fishId)
                    @php
                      $fish = \App\Models\Fish::find($fishId);
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Nama Produk</td>
                      <td>:</td>
                      <td>{{ $fish->name }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Harga Produk</td>
                      <td>:</td>
                      <td>Rp. {{ number_format($fish->price, 0, ',', '.') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <table class="table table-borderless table-responsive">
                <p class="pt-3"><strong>Pembayaran :</strong></p>
                <tbody>
                  <tr>
                    <td>Total Pembayaran</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                  </tr>
                  <tr>
                    <td>Metode Pembayaran</td>
                    <td>:</td>
                    <td>
                      @if ($order->payment == 1)
                        BCA
                      @elseif ($order->payment == 2)
                        BNI
                      @elseif ($order->payment == 3)
                        BRI
                      @elseif ($order->payment == 4)
                        Mandiri
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Pembelian</td>
                    <td>:</td>
                    <td>{{ $order->buy_date }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Pesanan</td>
                    <td>:</td>
                    <td>8965432{{ $order->id }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div>
            <button type="button" class="btn btn-primary"
              style="--bs-btn-padding-y: 0.25rem; --bs-btn-padding-x: 0.5rem; --bs-btn-font-size: 0.75rem"><a
                href="{{ route('admin.order.index') }}">Back</a></button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
