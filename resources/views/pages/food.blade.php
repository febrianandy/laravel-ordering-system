@include('partials_.header')

<!-- ========== MAIN CONTENT ========== -->
@include('components.aside')

<!-- End Navbar Vertical -->

<main id="content" role="main" class="main">
  <!-- Navbar Vertical Toggle -->

  <div class="food container-fluid">
    <h1 class="mt-5 mb-3 text-success">Food & Drinks</h1>
    <div class="row">
      @foreach ($makanan as $item)
      <div class="col-lg-3 col-md-4 mb-2">
        <!-- Card -->
        <div class="card shadow-sm border" style="max-width: 27rem;">
          <img class="card-img-top" src="/images/{{ $item->gambar }}" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">{{ $item->nama }} <span class="harga text-danger font-bold mx-2">Rp.{{ $item->harga
                }}</span></h3>
            <p class="card-text">{{ $item->deskripsi }}</p>
            <button type="button" class="btn btn-success">
              Add to Cart
              <i class="bi-basket ms-1"></i>
            </button>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>


  <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->



@include('partials_.footer')