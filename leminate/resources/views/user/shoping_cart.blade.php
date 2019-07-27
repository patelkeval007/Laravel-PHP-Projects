@extends('user.base')

@section('base')

<body class="animsition">

	@include('user.header')

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>

	@if ($cart_details->count() > 0)
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
	  <div class="container">
		<div class="row">
		  <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
			<div class="m-l-25 m-r--38 m-lr-0-xl">
			  <div class="wrap-table-shopping-cart">
	
				<table class="table-shopping-cart">
				  <tr class="table_head">
					<th class="column-1">Product</th>
					<th class="column-2"></th>
					<th class="column-3">Price</th>
					<th class="column-4">Quantity</th>
					<th class="column-5">Total</th>
					<th class="column-5"></th>
				  </tr>
				  @foreach ($cart_details as $cart_detail)
				  <tr class="table_row">
					<td class="column-1">
					  <div class="how-itemcart1">
						<img src="{{ asset('admin/img/products/'.$cart_detail->pimage) }}" alt="IMG">
					  </div>
					</td>
					<td class="column-2">{{$cart_detail->pname}}</td>
					<td class="column-3">₹ {{$cart_detail->pprice}}</td>
					<td class="column-4">
					  <center>{{$cart_detail->quantity}}</center>
					</td>
					<td class="column-5">₹ {{$cart_detail->total}}</td>
					<td class="column-5">
					  <form style="display: inline" method="post"
							action="{{route('product_remove_from_cart')}}">
						@csrf
						<input type="hidden" name="id" value="{{$cart_detail->id}}">
						<button class="btn btn-danger btn-circle btn-sm" type="submit">
						  Remove
						</button>
					  </form>
					</td>
				  </tr>
				  @endforeach
				</table>
			  </div>
			</div>
		  </div>
	
		  <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
			<form style="display: inline" method="post"
				  action="{{route('checkout')}}">
			  @csrf
			  <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
				<h4 class="mtext-109 cl2 p-b-30">
				  Cart Totals
				</h4>
	
				<div class="flex-w flex-t bor12 p-t-15 p-b-30">
				  <div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Shipping:
									</span>
				  </div>
	
				  <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
					<p class="stext-111 cl6 p-t-2">
					  There are no shipping methods available. Please double check your address, or contact us if you need
					  any
					  help.
					</p>
	
					<div class="p-t-15">
					<span class="stext-112 cl8">
						Address
					</span>
					  <div class="bor8 bg0 m-b-12">
						<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address"
							   placeholder="Enter Here" required>
					  </div>
					</div>
				  </div>
				</div>
	
				<div class="flex-w flex-t p-t-27 p-b-33">
				  <div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
				  </div>
	
				  <div class="size-209 p-t-1">
					<span class="mtext-110 cl2">
						₹ {{$total}}
					</span>
				  </div>
				</div>
	
				<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
				  Proceed to Checkout
				</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
	@else
	<div class="container">
	  <div class="row">
		<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
		  <div class="m-l-25 m-r--38 m-lr-0-xl">
			<div class="wrap-table-shopping-cart">
	
			  <table class="table-shopping-cart">
				<tr class="table_head">
				  <th class="column-1">Product</th>
				  <th class="column-2"></th>
				  <th class="column-3">Price</th>
				  <th class="column-4">Quantity</th>
				  <th class="column-5">Total</th>
				  <th class="column-5">Remove</th>
				</tr>
				<tr class="table_row">
				  <td class="column-1">
				  </td>
				  <td class="column-2"></td>
				  <td class="column-3"></td>
				  <td class="column-4">
				  </td>
				  <td class="column-5"></td>
				  <td class="column-5">
				  </td>
				</tr>
			  </table>
			</div>
			<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
			  <div class="flex-c-m stext-101 cl2 size-119 bg8 hov-btn3 p-lr-15 trans-01">
				Empty Cart
			  </div>
			</div>
		  </div>
		</div>
	
		<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
		  <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
			<h4 class="mtext-109 cl2 p-b-30">
			  Cart Totals
			</h4>
	
			<div class="flex-w flex-t bor12 p-t-15 p-b-30">
			  <div class="size-208 w-full-ssm">
									<span class="stext-110 cl2">
										Shipping:
									</span>
			  </div>
	
			  <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
				<p class="stext-111 cl6 p-t-2">
				  There are no shipping methods available. Please double check your address, or contact us if you need any
				  help.
				</p>
	
				<div class="p-t-15">
					<span class="stext-112 cl8">
						Address
					</span>
				  <div class="bor8 bg0 m-b-12">
					<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
						   placeholder="Enter Here">
				  </div>
				</div>
			  </div>
			</div>
	
			<div class="flex-w flex-t p-t-27 p-b-33">
			  <div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
			  </div>
	
			  <div class="size-209 p-t-1">
					<span class="mtext-110 cl2">
						₹ 0
					</span>
			  </div>
			</div>
	
			<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
			  Proceed to Checkout
			</button>
		  </div>
		</div>
	  </div>
	</div>
	@endif
		
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