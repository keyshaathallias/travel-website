@extends('admin.layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Dashboard</h3>
              </div>
              <div class="order-first col-12 col-md-6 order-md-1">
                <div class="float-start float-lg-end">
                  <div class="d-flex align-items-center">
                    <div class="name fs-6">
                      <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                      <h6 class="mb-0 text-muted">{{ Auth::user()->roles }}</h6>
                    </div>
                    <div class="avatar avatar-xl ms-3">
                      <img src="/dist/assets/compiled/jpg/3.jpg" alt="Face 1">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <header class="mb-1">
          <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
          </a>
        </header>
      </div>

      <div class="mb-0 page-heading">
        <div class="container-fluid">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page"><a href="/destination">Destination</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <!-- Table Data Destination -->
        <section class="section">
          <div class="row" id="table-striped">
            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex">
                  <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Destination</h3>
                  </div>
                  <div class="order-first col-12 col-md-6 order-md-2">
                    <div class="float-start float-lg-end">
                      <a href="{{ route('destination.create') }}" class="float-right m-auto btn btn-primary">Add
                        Destination</a>
                    </div>
                  </div>
                </div>
                <div class="card-body card-content">
                  <div class="table-responsive">
                    <table class="table mb-0 table-striped table-bordered table-hover">
                      <thead class="table-responsive">
                        <tr>
                          <th>No.</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Ticket Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="table-responsive">
                        @if ($destinations->isEmpty())
                          <tr>
                            <td colspan="5" class="text-center">
                              <div class="text-center justify-center items-center flex flex-col">
                                <img src="/img/destination-animate.svg" alt="No Destination Yet" width="300">
                                <p>No Destinations Available Yet</p>
                              </div>
                            </td>
                          </tr>
                        @else
                          @foreach ($destinations as $item)
                            <tr>
                              <td>{{ $loop->iteration }}.</td>
                              <td>
                                <img src="{{ asset('storage/img/' . $item->image) }}" style="border-radius: 8px;"
                                  width="250px" alt="{{ $item->name }}">
                              </td>
                              <td>{{ $item->name }}</td>
                              <td>{{ 'Rp ' . number_format($item->ticket_price, 2, ',', '.') }}</td>
                              <td class="">
                                <a href="{{ route('destination.edit', $item->id) }}" class="btn btn-warning"
                                  style="padding: 12px"><i class="bi bi-pencil-fill"></i></a>
                                <a href="{{ route('destination.destroy', $item->id) }}" class="btn btn-danger ms-2"
                                  style="padding: 12px" data-confirm-delete="true">
                                  <i class="bi bi-trash3-fill"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
{{-- <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace('content');
</script> --}}
