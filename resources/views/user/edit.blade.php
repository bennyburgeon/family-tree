@extends('layout.layout')
@section('body')
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Edit Branch Details</h5>
                    <!-- Account -->
                    
                    <hr class="my-0" />
                    <div class="card-body">
                    <form action="{{route('branches.update',$branch->user_id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                @method('PUT')
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Name</label>
                            <input class="form-control" type="text" id="name" value="{{ $branch->name  }}" name="name" placeholder="Name" autofocus />
                            @error('name')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Email</label>
                            <input class="form-control" type="text" id="email" value="{{ $branch->email  }}" name="email" placeholder="Email" />
                            @error('email')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Mobile</label>
                            <input class="form-control" type="text" id="mobile" value="{{ $branch->mobile  }}" name="mobile" placeholder="Mobile" />
                            @error('mobile')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Address</label>
                            <input class="form-control" type="text" id="address" value="{{ $branch->address  }}" name="address" placeholder="Address" />
                            @error('address')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Password</label>
                            <input class="form-control" type="text" id="password" name="password" placeholder="Password" />
                            @error('password')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                        <input class="form-check-input" type="checkbox" id="status" value="1" name="status" @if($branch->status==1) checked @endif />
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