@include('admin.partials_.header')
<!-- ========== HEADER ========== -->
@include('admin.components.navbar')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div class="content container">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
          <h1 class="page-header-title">Dashboard</h1>
        </div>

      </div>
    </div>
  </div>
  <!-- End Content -->

  <!-- Footer -->
  <div class="footer">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <p class="fs-6 mb-0">&copy; Front. <span class="d-none d-sm-inline-block">2022 Htmlstream.</span></p>
        </div>
        <!-- End Col -->
        <div class="col-auto">
          <div class="d-flex justify-content-end">
            <!-- List Separator -->
            <ul class="list-inline list-separator">
              <li class="list-inline-item">
                <a class="list-separator-link" href="#">FAQ</a>
              </li>
              <li class="list-inline-item">
                <a class="list-separator-link" href="#">License</a>
              </li>
              <li class="list-inline-item">
                <!-- Keyboard Shortcuts Toggle -->
                <button class="btn btn-ghost-secondary btn btn-icon btn-ghost-secondary rounded-circle" type="button"
                  data-bs-toggle="offcanvas" data-bs-target="#offcanvasKeyboardShortcuts"
                  aria-controls="offcanvasKeyboardShortcuts">
                  <i class="bi-command"></i>
                </button>
                <!-- End Keyboard Shortcuts Toggle -->
              </li>
            </ul>
            <!-- End List Separator -->
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
    </div>
  </div>
  <!-- End Footer -->
</main>

@include('admin.partials_.footer')