@extends('admin.layouts.layoutDashboard')

@section('content')
  <div class="mb-0 page-heading">
    <div class="container-fluid">
      <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
        <ol class="breadcrumb">
          <li class="breadcrumb-item" aria-current="page"><a href="/payment">Payment</a></li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="page-content">
    <section class="section">
      <div class="row" id="table-striped">
        <div class="col-12">
          <div class="card">
            <div class="flex flex-wrap card-header">
              <h3>Payment</h3>
            </div>
            <div class="card-body card-content">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-bordered table-hover">
                  <thead class="table-responsive">
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Destination</th>
                      <th>Ticket Price</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-responsive">
                    @if ($payment->isEmpty())
                      <tr>
                        <td colspan="9" class="text-center">
                          <div class="flex flex-col items-center justify-center text-center">
                            <img src="/img/no-data-animate.svg" alt="No Payment Yet" width="300">
                            <p>No Payments Available Yet</p>
                          </div>
                        </td>
                      </tr>
                    @else
                      @if ($isPayment)
                        <tr>
                          <td colspan="10" class="text-center">
                            <div class="flex flex-col items-center justify-center text-center">
                              <img src="/img/no-data-animate.svg" alt="No Payment Yet" width="300">
                              <p>No Payments Has Been Made Yet</p>
                            </div>
                          </td>
                        </tr>
                      @else
                        @foreach ($payment as $payment)
                          <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->user->email }}</td>
                            <td>{{ $payment->destination->name }}</td>
                            <td>{{ 'Rp ' . number_format($payment->destination->ticket_price, 2, ',', '.') }}</td>
                            <td>{{ $payment->cart->quantity }}</td>
                            <td>{{ 'Rp ' . number_format($payment->cart->total(), 2, ',', '.') }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>
                              <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-primary"><i
                                  class="bi bi-eye-fill"></i></a>
                            </td>
                          </tr>
                        @endforeach
                      @endif
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
