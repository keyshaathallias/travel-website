@extends('admin.layouts.layoutDashboard')

@section('content')
  <div class="mb-0 page-heading">
    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('payment.index') }}">Payment</a></li>
          <li class="breadcrumb-item active" aria-current="page">Confirm Payment</li>
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
                  <h4 class="card-title">Payment</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form action="{{ route('payment.update', $payment->id) }}" method="post"
                      class="form form-horizontal">
                      @csrf
                      @method('put')
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-4">
                            <label for="name">Name</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="text" id="name" class="form-control" name="name"
                              value="{{ $payment->user->name }}" readonly>
                          </div>
                          <div class="col-md-4">
                            <label for="email">Email</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="email" id="email" class="form-control" name="email"
                              value="{{ $payment->user->email }}" readonly>
                          </div>
                          <div class="col-md-4">
                            <label for="name">Destination</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="name" id="name" class="form-control" name="name"
                              value="{{ $payment->destination->name }}" readonly>
                          </div>
                          <div class="col-md-4">
                            <label for="ticket_price">Ticket Price</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="text" id="ticket_price" class="form-control" name="ticket_price"
                              value="{{ 'Rp ' . number_format($payment->destination->ticket_price, 2, ',', '.') }}"
                              readonly>
                          </div>
                          <div class="col-md-4">
                            <label for="quantity">Quantity</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="number" id="quantity" class="form-control" name="quantity"
                              value="{{ $payment->cart->quantity }}" readonly>
                          </div>
                          <div class="col-md-4">
                            <label for="total">Total Price</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <input type="text" id="total" class="form-control" name="total"
                              value="{{ 'Rp ' . number_format($payment->cart->total(), 2, ',', '.') }}" readonly>
                          </div>
                          <div class="col-md-4">
                            <label for="payment_proof">Proof of Payment</label>
                          </div>
                          <div class="col-md-8 form-group">
                            @if ($payment->payment_proof)
                              <div class="container">
                                <img src="{{ asset('storage/' . $payment->payment_proof) }}" alt="Proof Image"
                                  class="img-fluid">
                              </div>
                            @endif
                          </div>
                          <div class="col-md-4">
                            <label for="status">Status</label>
                          </div>
                          <div class="col-md-8 form-group">
                            <select id="status" class="form-select" aria-label="Default select example" name="status">
                              <option value="waiting for confirmation"
                                {{ $payment->status == 'waiting for confirmation' ? 'selected' : '' }}>
                                Waiting for Confirmation</option>
                              <option value="successful" {{ $payment->status == 'successful' ? 'selected' : '' }}>
                                Successful</option>
                            </select>
                            @error('status')
                              <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="mb-1 btn btn-primary me-1">Confirm</button>
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
