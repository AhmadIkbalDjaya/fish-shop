@extends('layouts.main')

@push('style')
  {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endpush

@section('body')
  @include('components.navbar')
  @include('components.spasi')

   <!-- produk -->
   <section id="headerProduk">
    <div class="container-fluid card shadow">
      <div class="row p-3">
        <div class="col-md-12">
          <h3>Produk</h3>
          <p>menambah, mengedit, atau menghapus produk</p>
        </div>
        <div class="col-md-4">
          <a href="{{ route('admin.fish.create') }}"><button type="button" class="btn btn-primary">Buat Produk</button></a>
        </div>
      </div>
    </div>
  </section>

  <!-- alerts -->
  <div id="liveAlertPlaceholder"></div>

  <!-- End Alerts -->

  <section class="produk">
    <div class="container-fluid card shadow my-3">
      <div class="row">
        <div class="col-md-12 p-4">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th class="col-md-0">No</th>
                  <th class="col-md-4">Nama Produk</th>
                  <th class="col-md-4">Harga Produk</th>
                  <th class="col-md-4">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($fishs as $fish)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $fish->name }}</td>
                    <td>Rp. {{ number_format($fish->price, 0, ',', '.') }}</td>
                    <td>
                      <a href="{{ route('admin.fish.show', ['fish' => $fish->id]) }}"><span class="badge text-bg-info">Informasi</span></a>
                      <a href="{{ route('admin.fish.edit', ['fish' => $fish->id]) }}"><span class="badge text-bg-warning">Edit Produk</span></a>
                      <a href="#"><span class="badge text-bg-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $fish->id }}">Delete</span></a>
                    </td>
                  </tr>
                  <!-- Modal Delete-->
                  <div class="modal fade" id="deleteModal{{ $fish->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $fish->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Apakah anda ingin {{ $fish->name }}?</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <form action="{{ route('admin.fish.destroy', ['fish' => $fish->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Ya</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
