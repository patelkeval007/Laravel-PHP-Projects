@extends('user.base')

@section('base')

<body class="animsition">

	@include('user.header')

	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			@if ($categories->count() > 0)
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					@foreach ($categories as $category)
					<form style="display: inline" method="post" action="{{route('product')}}">
						@csrf
						<input type="hidden" name="cat_id" value="{{$category->id}}">
						<button type="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"
							data-filter="*">
							{{$category->name}}
						</button>
					</form>
					@endforeach
				</div>
			</div>
			@endif

			<div class="row isotope-grid">
				@foreach ($products as $product)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{ asset('admin/img/products/'.$product->image) }}" alt="IMG-PRODUCT">
							<form style="display: inline" id="firstForm" method="post"
								action="{{route('product_detail') }}">
								@csrf
								<input type="hidden" name="id" value="{{$product->id}}">
								<button type="submit"
									class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Quick View
								</button>
							</form>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$product->name}}
								</a>

								<span class="stext-105 cl3">
									₹ {{$product->price}}
								</span>
							</div>

						</div>
					</div>
				</div>
				@endforeach
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
		$(".js-select2").each(function(){
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
		        	enabled:true
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
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="{{ asset('user/js/main.js') }} "></script>

</body>

@endsection