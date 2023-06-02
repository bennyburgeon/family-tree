@extends('layout.layout')
@section('body')
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Customer Details</h5>
                    <!-- Account -->
                    
                    <hr class="my-0" />
                    <div class="card-body">
                    <form action="{{route('customers.update',$customer->customer_id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                @method('PUT')
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstname" value="{{ $customer->firstname  }}" name="firstname" placeholder="First Name" autofocus />
                            @error('firstname')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Last Name</label>
                            <input class="form-control" type="text" id="lastname" value="{{ $customer->lastname  }}" name="lastname" placeholder="Last Name" autofocus />
                            @error('lastname')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Email</label>
                            <input class="form-control" type="text" id="email" value="{{ $customer->email  }}" name="email" placeholder="Email" />
                            @error('email')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Mobile</label>
                            <input class="form-control" type="text" id="mobile" value="{{ $customer->mobile  }}" name="mobile" placeholder="Mobile" />
                            @error('mobile')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          
                        </div>
                        
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">DOB</label>
                              <input class="form-control" type="date" value="{{ $customer->dob  }}" id="html5-date-input" name="dob" placeholder="Date of birth" />
                              @error('dob')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">Gender</label>
                              <select class="form-control" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option @if($customer->gender==1) selected="selected" @endif value="1">Male</option>
                                <option @if($customer->gender==2) selected="selected" @endif value="2">Female</option>
                                <option @if($customer->gender==3) selected="selected" @endif value="3">Other</option>
                              </select>
                              @error('gender')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          </div>
                            
                            <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">Address</label>
                              <textarea id="address" class="form-control" name="address" placeholder="Address"> {{ $customer->address  }}</textarea>
                              @error('address')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                            
                          </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                        <input class="form-check-input" type="checkbox" id="status" value="1" name="status" @if($customer->status==1) checked @endif />
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            @endsection
@push('css')
@endpush
@push('js')
@endpush