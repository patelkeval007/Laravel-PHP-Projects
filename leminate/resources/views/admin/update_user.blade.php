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
        <div class="container">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Update Customer Details</h1>
          <form method="post" action="{{route('update_user')}}">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-4">
                <input type="text" name="name" class="form-control" id="inputEmail3" value="{{$user->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-4">
                <input type="email" name="email" class="form-control" id="inputEmail3" value="{{$user->email}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-4">
                <input type="text" name="address" class="form-control" id="inputEmail3" value="{{$user->address}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">DOB</label>
              <div class="col-sm-4">
                <input type="date" name="dob" class="form-control" id="inputEmail3" value="{{$user->dob}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
              <div class="col-sm-4">
                <input type="tel" name="m_no" class="form-control" id="inputEmail3" value="{{$user->m_no}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-4">
                <button class="btn btn-primary" type="submit">Update</button>
              </div>
            </div>
            <div class="col-md-4 mb-3">

            </div>
          </form>

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