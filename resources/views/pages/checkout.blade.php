@extends('layouts.checkout')

@section('title', 'Checkout')

@section('content') 
{{-- URL gambar tolong diganti  --}}
  <main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
      <div class="container">
        <div class="row">
          <div class="col p-0">
            <nav>
              <ol class="breadcrumb ms-3">
                <li class="breadcrumb-item">
                  <a href="{{ route('home') }}">Paket Travel</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ (route('detail', $item->id)) }}">Details</a>
                </li>
                <li class="breadcrumb-item active">
                  Checkout
                </li>
              </ol>
            </nav>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details">
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <h1>Who is Going?</h1>
              <p>
                Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}
              </p>
              <div class="table-responsive-sm text-center">
                <table class="table">
                  <thead>
                    <tr>
                      <td>Picture</td>
                      <td>Name</td>
                      <td>Nationality</td>
                      <td>Visa</td>
                      <td>Passport</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($item->details as $detail)
                      <tr>
                        <td>
                          <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle"/>
                        </td>
                        <td class="align-middle">
                          {{ $detail->username }}
                        </td>
                        <td class="align-middle">
                          {{ $detail->nationality }}
                        </td>
                        <td class="align-middle">
                          {{ $detail->is_visa ? '30 days' : 'N/A' }}
                        </td>
                        <td class="align-middle">
                          {{ \Carbon\Carbon::createFromDate($detail->doe_passport) >
                          \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                        </td>
                        <td class="align-middle">
                          <form action="{{ route('checkout-remove', $detail->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">
                              <img src="{{ url('frontend/images/ic_remove.png') }}" alt="">
                            </button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="6" class="text-center">
                          No Visitor
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="member mt-3">
                <h2>Add Member</h2>
                <form class="row g-2" method="post" action="{{ route('checkout-create', $item->id) }}">
                  <div class="col-auto">
                    @csrf
                    <label for="username" class="visually-hidden">Name</label>
                    <input 
                      type="text" 
                      name="username"
                      class="form-control mb-2 mr-sm-2" 
                      id="username"
                      required
                      placeholder="Username"
                    />
                  </div>
                  <div class="col-auto">
                    <label for="nationality" class="visually-hidden">Nationality</label>
                    <input 
                      type="text" 
                      name="nationality"
                      class="form-control mb-2 mr-sm-2" 
                      style="width: 50px"
                      id="nationality"
                      required
                      placeholder="Nationality"
                    />
                  </div>
                  <div class="col-auto">
                    <label for="is_visa" class="visually-hidden">Visa</label>
                    <select
                      name="is_visa"
                      id="is_visa"
                      required
                      class="form-select mb-2 mr-sm-2"
                      >
                      <option value="" selected>VISA</option>
                      <option value="1">30 Days</option>
                      <option value="0">N/A</option>
                    </select>
                  </div>
                  <div class="col-auto">
                    <label for="doe_passport" class="visually-hidden">DOE Passport</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <input 
                        type="text"
                        name="doe_passport"
                        class="form-control datepicker"
                        id="doe_passport"
                        placeholder="DOE Passport"
                        required
                      />
                    </div>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-add-now mb-2 px-4">
                      Add Now
                    </button>
                  </div>
                </form>
                <h3 class="mt-2 mb-0">Note</h3>
                <p class="disclaimer mb-0">
                  You are only able to invite member that has registered in Nomads.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 pt-sm-4 pt-lg-0">
            <div class="card card-details card-right">           
                <h2>Checkout Informations</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Members</th>
                    <td width="50%" class="text-right">
                      {{ $item->details->count() }} person
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Additional VISA</th>
                    <td width="50%" class="text-right">
                      $ {{ $item->additional_visa }},00
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Trip Price</th>
                    <td width="50%" class="text-right">
                      $ {{ $item->travel_package->price }},00 / person
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Sub Total</th>
                    <td width="50%" class="text-right">
                      $ {{ $item->transaction_total }},00
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Total (+Unique)</th>
                    <td width="50%" class="text-right text-total">
                      <span class="text-blue">$ {{ $item->transaction_total }},
                      </span>
                      <span class="text-orange">{{ mt_rand(0,99) }}</span>
                    </td>
                  </tr>
                </table>

                <hr />
                <h2>Payment Instructions</h2>
                <p class="payment-instructions">
                  You will be redirected to another page to pay using GO-PAY
                </p>
                {{-- <img src="{{ url('frontend/images/gopay.png') }}" class="w-50"> --}}
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                    <div class="description">
                      <h3>PT Nomads ID</h3>
                      <p>
                          0881 8829 8800
                          <br>
                          Bank Central Asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="bank-item pb-3">
                    <img src="{{ url('frontend/images/ic_bank.png') }}" alt="" class="bank-image">
                    <div class="description">
                      <h3>PT Nomads ID</h3>
                      <p>
                          0899 8501 7888
                          <br>
                          Bank HSBC
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
            </div>
            <div class="join-container">
              <form action="{{ route('checkout-success', $item->id) }}" method="POST">
                @csrf
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
                    Continue to Payment
                  </button>
                </div>
              </form>
            </div>
            <div class="text-center mt-3">
              <a href="{{ (route('detail', $item->travel_package->slug)) }}" class="text-muted">
                Cancel Booking
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@push('prepend-style')
  <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
  <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap5',
        icons: {
          rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" />'
        }
      });
    });
  </script>
@endpush

  
