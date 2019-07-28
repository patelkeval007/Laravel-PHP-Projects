@extends('user.base')

@section('base')

<body class="animsition">

	@include('user.header')

	<div class="container p-4">
		<div class="row">
			@include('user.myaccount_sidebar')
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<h4>Your Profile</h4>
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<form style="display: inline" method="post" action="{{route('edit_profile')}}">
									@csrf
									<div class="form-group row">
										<label for="username" class="col-4 col-form-label">User Name</label>
										<div class="col-8">
											<input id="username" name="name" value="{{$user->name}}" class="form-control here" required="required" type="text">
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-4 col-form-label">Email</label>
										<div class="col-8">
											<input id="email" name="email" value="{{$user->email}}" class="form-control here" required="required" type="text">
										</div>
									</div>
									<div class="form-group row">
										<label for="publicinfo" class="col-4 col-form-label">Address</label>
										<div class="col-8">
											<input id="publicinfo" type="text" name="address" cols="40" value="{{$user->address}}" rows="4" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label for="website" class="col-4 col-form-label">DOB</label>
										<div class="col-8">
											<input id="website" name="dob" value="{{$user->dob}}" class="form-control here" type="date">
										</div>
									</div>
									<div class="form-group row">
										<label for="website" class="col-4 col-form-label">Contact No.</label>
										<div class="col-8">
											<input id="website" name="m_no" value="{{$user->m_no}}" class="form-control here" type="tel">
										</div>
									</div>
									<div class="form-group row">
										<div class="offset-4 col-8">
											<button name="submit" type="submit" class="btn btn-primary">Update My
												Profile</button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	@include('user.footer')

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('user/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('user/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('user/js/slick-custom.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/parallax100/parallax100.js') }}"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/isotope/isotope.pkgd.min.js') }}"></script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/js/main.js') }} "></script>

</body>

@endsection