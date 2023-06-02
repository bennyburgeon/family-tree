@extends('layout.layout')
@section('body')
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Branch Details</h5>
                    <!-- Account -->
                    
                    <hr class="my-0" />
                    <div class="card-body">
                    <form action="{{route('branches.store')}}" method="post" enctype="multipart/form-data" >
                        {!! csrf_field() !!}
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Name</label>
                            <input class="form-control" type="text" value="{{old('name')}}" id="name" name="name" placeholder="Name" autofocus />
                            @error('name')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Email</label>
                            <input class="form-control" type="text" value="{{old('email')}}" id="email" name="email" placeholder="Email" />
                            @error('email')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Mobile</label>
                            <input class="form-control" type="text" value="{{old('mobile')}}" id="mobile" name="mobile" placeholder="mobile"  />
                            @error('mobile')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Address</label>
                            <input class="form-control" type="text" value="{{old('address')}}" id="address" name="address" placeholder="Address"  />
                            @error('address')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Password</label>
                            <input class="form-control" type="text" value="{{old('password')}}" id="password" name="password" placeholder="Password" />
                            @error('password')<span class="error-message"role="alert">{{ $message }} </span>@enderror
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