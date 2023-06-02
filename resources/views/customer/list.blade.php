
@extends('layout.layout')
@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
    <h5 class="card-header">Customer List</h5>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($lists as $list)
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $list->firstname }} {{ $list->lastname }}</strong></td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->mobile }}</td>
                <td>{{ $list->address }}</td>
                <td>
                    @if($list->status!=1)
                    <span class="badge bg-label-danger me-1">Inactive</span>
                    @else
                    <span class="badge bg-label-primary me-1">Active</span></td>
                    @endif
                <td>
                    <a href="{{ route('customers.edit',encrypt($list->customer_id))}}">
                        <button type="button" class="btn btn-xs btn-outline-success"><i class="bx bx-edit me-1"></i></button>
                    </a>
                    
                    <form method="POST" action="{{ route('customers.destroy', encrypt($list->customer_id)) }}">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button type="submit" class="btn btn-xs btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i></button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
  @endsection
  @push('css')

  @endpush
  @push('js')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>
  @endpush