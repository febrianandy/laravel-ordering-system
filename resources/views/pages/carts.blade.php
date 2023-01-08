@include('partials_.header')

<!-- ========== MAIN CONTENT ========== -->
@include('components.aside')

<!-- End Navbar Vertical -->

<main id="content" role="main" class="main">



  <div class="content container-fluid">
    <!-- Step Form -->
    <form action="/order" method="POST">
      @csrf
      <!-- Card -->
      <div class="card mb-3 mb-lg-5">
        <!-- Header -->
        <div class="card-header card-header-content-between">
          <h4 class="card-header-title">Order details <span
              class="badge bg-soft-dark text-dark rounded-circle ms-1">4</span></h4>
          <a class="link" href="javascript:;">Edit</a>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="card-body">
          <!-- Step Form Content -->
          @if(session()->has('cart'))
          @foreach(session('cart') as $id => $details)
          <!-- Media -->
          <div class="d-flex">
            <div class="flex-shrink-0">
              <div class="avatar avatar-xl">
                <img class="img-fluid" src="/images/{{ $details['gambar'] }}" alt="Image Description">
              </div>
            </div>

            <div class="flex-grow-1 ms-3">
              <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                  <a class="h5 d-block" href="./ecommerce-product-details.html">{{ $details['nama'] }}</a>

                  <div class="fs-6 text-body">
                    <span>harga</span>
                    <span class="fw-semibold">{{ $details['harga'] }}</span>
                  </div>
                </div>
                <!-- End Col -->

                <div class="col col-md-2 align-self-center">
                  <a href="/remove-from-cart/{{ $details['menu_id'] }}" class="btn btn-danger">
                    Delete

                  </a>
                </div>
                <!-- End Col -->

                <div class="col col-md-2 align-self-center">
                  <h5>{{ $details['quantity'] }}</h5>
                </div>
                <!-- End Col -->

                <div class="col col-md-2 align-self-center text-end">
                  <h5>{{ $details['harga'] }}</h5>
                </div>
                <!-- End Col -->
              </div>
              <!-- End Row -->
            </div>
          </div>
          @endforeach
          @else
          <div class="carts position-absolute top-50 start-50 translate-middle">
            <div class="img">
              <img src="/assets/svg/illustrations/oc-empty-cart.svg" alt="" width="300">
            </div>
            <div class="text-carts mt-3 text-center">
              <span class="text-success">Upss anda belum mempunyai Item !!</span>
            </div>
          </div>
          @endif
          <!-- End Media -->

          <hr>






          <hr>

          <div class="row justify-content-md-end mb-3">
            <div class="col-md-8 col-lg-7">
              <dl class="row text-sm-end">
                <dt class="col-sm-6">Subtotal:</dt>
                <dd class="col-sm-6">$65.00</dd>
                <dt class="col-sm-6">Amount paid:</dt>
                <dd class="col-sm-6">$65.00</dd>
              </dl>
              <!-- End Row -->
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Body -->
        <button class="btn btn-success py-3">Buat Pesanan</button>
      </div>
      <!-- End Card -->

    </form>
  </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->



@include('partials_.footer')