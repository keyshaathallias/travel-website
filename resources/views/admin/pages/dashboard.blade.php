@extends('admin.layouts.layoutDashboard')

@section('content')
  <div id="app">
    <div id="main">
      <div class="content-header">
        <div class="mb-4 card card-body">
          <div class="container-fluid align-items-center">
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
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="page-content">
        <section>
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="px-4 card-body py-4-5">
                  <div class="row justify-center flex items-center text-center">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 flex justify-center">
                      <div class="mb-2 stats-icon blue">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                          class="bi bi-globe2" viewBox="0 0 16 16">
                          <path
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z" />
                        </svg>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                      <h6 class="font-semibold text-muted">Destination</h6>
                      <h6 class="mb-0 font-extrabold">{{ number_format($totalDestination) }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <div class="px-4 card-body py-4-5">
                  <div class="row justify-center flex items-center text-center">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 flex justify-center ">
                      <div class="mb-2 stats-icon green">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                          class="bi bi-person-fill" viewBox="0 0 16 16">
                          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                      </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                      <h6 class="font-semibold text-muted">Account</h6>
                      <h6 class="mb-0 font-extrabold">{{ number_format($totalUser) }}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Table Data Destionation -->
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
                      <table class="table mb-3 table-striped table-bordered table-hover">
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
                      <a href="{{ route('destination.index') }}" class="text-sm">See more data →</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Table Data Account -->
          <section class="section">
            <div class="row" id="table-striped">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex">
                    <div class="order-last col-12 col-md-6 order-md-1">
                      <h3>Account</h3>
                    </div>
                    <div class="order-first col-12 col-md-6 order-md-2">
                      <div class="float-start float-lg-end">
                        <a href="#" class="float-right m-auto btn btn-primary">Add Account</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body card-content">
                    <div class="table-responsive">
                      <table class="table mb-3 table-striped table-bordered table-hover">
                        <thead class="table-responsive">
                          <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="table-responsive">
                          @if ($users->isEmpty())
                            <tr>
                              <td colspan="5" class="text-center">
                                <div class="text-center justify-center items-center flex flex-col">
                                  <img src="/img/no-data-animate.svg" alt="No Data Yet" width="300">
                                  <p>No Accounts Available Yet</p>
                                </div>
                              </td>
                            </tr>
                          @else
                            @foreach ($users as $user)
                              <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles }}</td>
                                <td class="d-flex">
                                  <a href="#" class="btn btn-warning"><i
                                      class="bi bi-pencil-fill"></i></a>
                                  <a href="#" class="btn btn-danger ms-2"
                                    data-confirm-delete="true">
                                    <i class="bi bi-trash3-fill"></i></a>
                                </td>
                              </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      <a href="{{ route('account.index') }}" class="text-sm">See more data →</a>
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
