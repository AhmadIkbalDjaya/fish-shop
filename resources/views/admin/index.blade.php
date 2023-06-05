@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar')
  <section id="dashboard">
    <div class="container h-100 text-center">
      <div class="row h-100 align-content-center justify-content-center">
        <div class="col-md-12 text-white">
          <h1>Food Shop</h1>
        </div>
        <div>
          <img src="../images/food.png" alt="img" style="height : 250px">
        </div>
        <div class="col-md-12 text-white">
          <h2>Toko Makanan Terbaik</h2>
        </div>
      </div>
    </div>
  </section>
@endsection
