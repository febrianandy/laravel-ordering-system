@include('admin.partials_.header')
<!-- ========== HEADER ========== -->
@include('admin.components.navbar')
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
  <!-- Content -->
  <div class="content container">
    @if(session('tambah-menu'))
    <div class="alert alert-success">
      {{ session('tambah-menu') }}
    </div>
    @endif
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-sm-10 mb-2 mb-sm-0">
          <h1 class="page-header-title">Menu</h1>
        </div>
        <div class="col-sm-2 mb-5">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Menu
          </button>
        </div>
        <div class="tambah-menu">
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/dashboard/tambah-menu" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Menu</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="nama">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Category</label>
                      <!-- Select -->
                      <div class="tom-select-custom">
                        <select name="kategori" class="js-select form-select" autocomplete="off"
                          data-hs-tom-select-options='{
          "placeholder": "Select a category...",
          "hideSearch": true
        }'>
                          <option value="">Select a category...</option>
                          <option value="makanan">Makanan</option>
                          <option value="minuman">Minuman</option>
                        </select>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Harga</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="harga">
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Gambar</label>
                      <input class="form-control" type="file" id="formFile" name="gambar">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah menu</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
          <!-- End Modal -->
        </div>
      </div>
      <div class="card">
        <!-- Header -->
        <div class="card-header">
          <div class="row justify-content-between align-items-center flex-grow-1">
            <div class="col-12 col-md">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header-title">Users</h5>
              </div>
            </div>

            <div class="col-auto">
              <!-- Filter -->
              <form>
                <!-- Search -->
                <div class="input-group input-group-merge input-group-flush">
                  <div class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </div>
                  <input id="datatableWithSearchInput" type="search" class="form-control" placeholder="Search users"
                    aria-label="Search users">
                </div>
                <!-- End Search -->
              </form>
              <!-- End Filter -->
            </div>
          </div>
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
          <table
            class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
            data-hs-datatables-options='{
                           "order": [],
                           "search": "#datatableWithSearchInput",
                           "isResponsive": false,
                           "isShowPaging": false,
                           "pagination": "datatableWithSearchPagination"
                         }'>
            <thead class="thead-light">
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $item)
              <tr>
                <td>
                  <a class="d-flex align-items-center" href="">
                    <img src="/images/{{ $item->gambar }}" alt="" height="50"
                      class="avatar avatar-soft-primary avatar-circle">
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">{{ $item->nama }}</span>
                      <span class="d-block fs-5 text-body">{{ $item->nama }}</span>
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">{{ $item->kategori }}</span>
                  <span class="d-block fs-5">{{ $item->kategori }}</span>
                </td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->harga }}</td>
                <td>
                  <a href="/dashboard/edit-menu/{{ $item->id }}" class="btn btn-sm btn-white">Edit</a>
                  <a href="/dashboard/hapus-menu/{{ $item->id }}" class="btn btn-sm btn-white">Hapus</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
          <!-- Pagination -->
          <div class="d-flex justify-content-center justify-content-sm-end">
            <nav id="datatableWithSearchPagination" aria-label="Activity pagination"></nav>
          </div>
          <!-- End Pagination -->
        </div>
        <!-- End Footer -->
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