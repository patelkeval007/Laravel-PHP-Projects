@extends('admin.base')

@section('base')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('admin.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('admin.header')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if ($sales->count() > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Product</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Customer</th>
                      <th>Supplier</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Product</th>
                      <th>Address</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Customer</th>
                      <th>Supplier</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    {{-- @foreach ($sales as $index => $sales) --}}
                    @foreach ($sales as $sales)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{$sales->p_name}}</td>
                      <td>{{$sales->s_o_address}}</td>
                      <td>{{$sales->s_o_date}}</td>
                      <td>{{$sales->s_o_d_quantity}}</td>
                      <td>{{$sales->s_o_d_total}}</td>
                      <td>{{$sales->s_o_status}}</td>
                      <td>{{$sales->u_name}}</td>
                      <td>{{$sales->s_name}}</td>
                      <td>
                        <form style="display: inline" id="firstForm" method="post"
                          action="{{route('update_sales_page')}}">
                          @csrf
                          <input type="hidden" name="id" value="{{$sales->s_o_id}}">
                          <button class="btn btn-primary btn-circle btn-sm" type="submit">
                            <i class="fas fa-edit"></i>
                          </button>
                        </form>
                        <form style="display: inline" method="post" action="{{route('del_sales')}}">
                          @csrf
                          @method('delete')
                          <input type="hidden" name="id" value="{{$sales->s_o_id}}">
                          <button class="btn btn-danger btn-circle btn-sm" type="submit">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('admin.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>


  <!-- Page level plugins -->
  <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>


</body>

@endsection