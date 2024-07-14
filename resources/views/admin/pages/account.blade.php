@extends('admin.layouts.layoutDashboard')

@section('content')
  <div class="mb-0 page-heading">
    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href="/account">Account</a></li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-content">
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
                  <a href="{{ route('account.create') }}" class="float-right m-auto btn btn-primary">Add Account</a>
                </div>
              </div>
            </div>
            <div class="card-body card-content">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-bordered table-hover">
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
                          <div class="flex flex-col items-center justify-center text-center">
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
                            <a href="{{ route('account.edit', $user->id) }}" class="btn btn-warning"><i
                                class="bi bi-pencil-fill"></i></a>
                            <a href="{{ route('account.destroy', $user->id) }}" class="btn btn-danger ms-2"
                              data-confirm-delete="true">
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
@endsection
