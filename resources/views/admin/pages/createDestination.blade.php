@extends('admin.layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid align-items-center">
            <div class="row align-items-center">
              <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Destination</h3>
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
              <li class="breadcrumb-item"><a href="{{ route('destination.index') }}">Destination</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Destination</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <!-- table striped -->
        <section class="section">
          <div class="card-body card-content">
            <section id="basic-horizontal-layouts">
              <div class="row match-height">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Add Destination</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <form action="{{ route('destination.store') }}" method="post" class="form form-horizontal"
                          enctype="multipart/form-data">
                          @csrf
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-4">
                                <label for="image">Image</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="file" id="image" class="form-control" name="image"
                                  placeholder="Upload the image">
                                @error('image')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="name">Destination Name</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="text" id="name" class="form-control" name="name"
                                  placeholder="Destination Name">
                                @error('name')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-md-4">
                                <label for="ticket_price">Ticket Price (IDR)</label>
                              </div>
                              <div class="col-md-8 form-group">
                                <input type="number" id="ticket_price" class="form-control" name="ticket_price"
                                  placeholder="Ticket Price">
                                @error('ticket_price')
                                  <small>{{ $message }}</small>
                                @enderror
                              </div>
                              <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="mb-1 btn btn-primary me-1">Submit</button>
                                <button type="reset" class="mb-1 btn btn-light-secondary me-1">Reset</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
