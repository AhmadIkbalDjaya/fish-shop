@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/users.css') }}"> --}}
@endpush

@section('body')
<section id="succes" style="height: 100vh">
    <div class="container-fluid h-100">
      <div class="row align-items-center h-100">
        <div class="col-md-12 text-center">
          <h1 class="fs-1 fw-bold text-primary">SUCCES</h1>
          <img src="{{ asset('/images/succes.png') }}" alt="img" height="290px" />
          <h2 class="section-title">Pembayaran Berhasil!</h2>
          <p class="about__description">Silakan tunggu update terbaru dari kami via email yang sudah <br />Anda daftarkan sebelumnya.</p>
          <div class="backhome__button">
            <a href="{{ route('home') }}" class="btn btn-info">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
