@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/users.css') }}"> --}}
@endpush

@section('body')
  <section id="Payment" style="height: 100vh">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="row shadow p-3 justify-content-center">
            <div class="col-md-3">
              <div class="row text-center">
                <div class="col-12">
                  <p>Tanggal Pembelian</p>
                </div>
                <div class="col-12">
                  <p>20/06/2023</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="row text-center">
                <div class="col-12">
                  <p>Nomor Pesanan</p>
                </div>
                <div class="col-12">
                  <p>983973937</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 text-center">
              <div class="row text-center">
                <div class="col-12">
                  <p>Metode Pembayaran</p>
                </div>
                <div class="col-12">
                  <p>BCA</p>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div><img src="{{ asset('/images/payment1.png') }}" alt="img" class="img-fluid" /></div>
            </div>
          </div>
          <div class="row card shadow p-4 mt-3">
            <div class="col-md-12">
              <h4 class="card-header">Detail</h4>
              <div class="card-body">
                <div class="col-2 col-md-6">
                  <table class="table table-borderless table-responsive">
                    <tbody>
                      <tr>
                        <td>Jumlah Deposit</td>
                        <td>:</td>
                        <td>500.000</td>
                      </tr>
                      <tr>
                        <td>Nomor Rekening</td>
                        <td>:</td>
                        <td>2208 1996 1403</td>
                      </tr>
                      <tr>
                        <td>Nama penerima</td>
                        <td>:</td>
                        <td>Shanya</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer text-body-secondary">
                <div class="row">
                  <div class="col-md-6">
                    <strong>Total Pembayaran</strong>
                  </div>
                  <div class="col-md-6 text-end">
                    <strong>Rp500.000</strong>
                  </div>
                </div>
              </div>
            </div>
            <a href="{{ route('success') }}" class="btn btn-info mt-4">Lanjut</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @push('script')
    <script src="{{ asset('/js/script.js') }}"></script>
  @endpush
@endsection
