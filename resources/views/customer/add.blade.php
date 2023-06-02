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
                    <form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data" >
                        {!! csrf_field() !!}
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstname"  name="firstname" placeholder="First Name" autofocus />
                            @error('firstname')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Last Name</label>
                            <input class="form-control" type="text" id="lastname"  name="lastname" placeholder="Last Name" autofocus />
                            @error('lastname')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          
                        </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">Email</label>
                              <input class="form-control" type="text" id="email" name="email" placeholder="Email" />
                              @error('email')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">Mobile</label>
                              <input class="form-control" type="text" id="mobile" name="mobile" placeholder="mobile"  />
                              @error('mobile')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">DOB</label>
                              <input class="form-control" type="date" id="html5-date-input" name="dob" placeholder="Date of birth" />
                              @error('dob')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">Gender</label>
                              <select class="form-control" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                              </select>
                              @error('gender')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label for="Treatment" class="form-label">Address</label>
                              <textarea id="address" class="form-control" name="address" placeholder="Address"></textarea>
                              @error('address')<span class="error-message"role="alert">{{ $message }} </span>@enderror
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
<script type="text/javascript">
$(document).ready(function () {
$('.cat_div').hide();
$('.validity_div').hide();
  $(document).on('keyup', ".calculation", function() {
        var brow_shape = $('.brow_shape').val();
        var brow_tint = $('.brow_tint').val();
        var gel_polish = $('.gel_polish').val();
        var gents_haircut = $('.gents_haircut').val();
        var child_haircut = $('.child_haircut').val();
        var amount = 0;
        if(brow_shape){
          amount+=(brow_shape*1.1);
        }
        if(brow_tint){
          amount+=(brow_shape*1.2);
        }
        if(gel_polish){
          amount+=(gel_polish*2.6);
        }
        if(gents_haircut){
          amount+=(gents_haircut*2);
        }
        if(child_haircut){
          amount+=(child_haircut*1.6);
        }
        $('.wallet').val(amount);
            
  });

  $(document).on('change', ".category", function() {
    var category = $('.category').val();
    if(category==2){
      $('.cat_div').show();
      $('.validity_div').show();
    }else{
      $('.cat_div').hide();
      $('.validity_div').hide();
    }
    if(category!=1){
      $('.cat_div').show();
    }else{
      $('.cat_div').hide();
    }
  });
});
</script>
@endpush