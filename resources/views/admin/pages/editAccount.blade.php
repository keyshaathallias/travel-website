@extends('admin.layouts.layoutDashboard')

@section('content')
  <div class="mb-0 page-heading">
    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('account.index') }}">Account</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
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
                  <h4 class="card-title">Edit Account</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form action="{{ route('account.update', $user->id) }}" method="post" class="form form-horizontal">
                      @csrf
                      @method('put')
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="name">Name</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="text" id="name" class="form-control" name="name"
                              value="{{ $user->name }}">
                            @error('name')
                              <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-md-4">
                            <label for="email">Email</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="email" id="email" class="form-control" name="email"
                              value="{{ $user->email }}">
                            @error('email')
                              <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-md-4">
                            <label for="roles">Role</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <select id="roles" class="form-select" aria-label="Default select example" name="roles">
                              <option value="administrator" {{ $user->roles == 'administrator' ? 'selected' : '' }}>
                                Administrator</option>
                              <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('roles')
                              <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="mb-1 btn btn-primary me-1">Edit</button>
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
@endsection
