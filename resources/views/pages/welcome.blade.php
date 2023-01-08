@extends('layouts.index')

@section('content')


<main id="content" role="main" class="main">
  <!-- Navbar Vertical Toggle -->

  <div class="food container-fluid">
    <h1 class="mt-5 mb-3 text-success divider-start"><span class="">Food & Drinks</span></h1>
    @if(session()->has('success-cart'))
    <div class="alert alert-success">
      {{ session()->get('success-cart') }}
    </div>
    @endif
    <div class="row">
      @foreach ($menus as $item)
      <div class="col-lg-3 col-md-4 mb-2">
        <!-- Card -->
        <div class="card shadow-sm border" style="max-width: 27rem;">
          <img class="card-img-top" src="/images/{{ $item->gambar }}" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">{{ $item->nama }} <span class="harga text-danger font-bold mx-2">Rp.{{ $item->harga
                }}</span></h3>
            <p class="card-text">{{ $item->deskripsi }}</p>
            <a href="/add-to-cart/{{ $item->id }}" class="btn btn-success">
              Add to Cart
              <i class="bi-basket ms-1"></i>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    {{-- <div class="row mt-5">
      <div class="col-lg-3 col-md-4">
        <!-- Card -->
        <div class="card shadow-sm border" style="max-width: 27rem;">
          <img class="card-img-top" src="/assets/img/documentation/gudeng.jpeg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Gudeg <span class="harga text-danger font-bold mx-2">Rp.30.000</span></h3>
            <p class="card-text">This is a longer card with supporting text below as </p>
            <button type="button" class="btn btn-success">
              Add to Cart
              <i class="bi-basket ms-1"></i>
            </button>
          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-lg-3 col-md-4">
        <!-- Card -->
        <div class="card shadow-sm border" style="max-width: 27rem;">
          <img class="card-img-top" src="/assets/img/documentation/sate.jpeg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Card title</h3>
            <p class="card-text">This is a longer card with supporting text below as</p>
            <button type="button" class="btn btn-success">
              Add to Cart
              <i class="bi-basket ms-1"></i>
            </button>
          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-lg-3 col-md-4">
        <!-- Card -->
        <div class="card shadow-sm border" style="max-width: 27rem;">
          <img class="card-img-top" src="/assets/img/documentation/nasi-goreng.jpeg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Card title</h3>
            <p class="card-text">This is a longer card with supporting text below as </p>
            <button type="button" class="btn btn-success">
              Add to Cart
              <i class="bi-basket ms-1"></i>
            </button>
          </div>
        </div>
        <!-- End Card -->
      </div>
      <div class="col-lg-3 col-md-4">
        <!-- Card -->
        <div class="card shadow-sm border" style="max-width: 27rem;">
          <img class="card-img-top" src="/assets/img/documentation/kepiting.jpg" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Card title</h3>
            <p class="card-text">This is a longer card with supporting text below as</p>
            <button type="button" class="btn btn-success">
              Add to Cart
              <i class="bi-basket ms-1"></i>
            </button>
          </div>
        </div>
        <!-- End Card -->
      </div>
    </div> --}}
  </div>

  <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


@endsection
{{-- @include('partials_.footer') --}}