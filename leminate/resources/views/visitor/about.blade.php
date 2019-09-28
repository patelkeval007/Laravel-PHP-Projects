@extends('visitor.base')

@section('base')

<body class="animsition">

	@include('visitor.header')

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		<h2 class="ltext-105 txt-center">
			About
		</h2>
	</section>


	<!-- Content page -->
	<div class="container">
		<div class="row p-b-148">
			<div class="col-md-7 col-lg-8">
				<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
					<h3 class="mtext-111 cl2 p-b-16">
						Our Story
					</h3>

					<p class="stext-113 cl6 p-b-26">
						Laminates uses a unique technology in which special resins impart extra strength to its
						laminates, making them highly resistant to scratch and abrasion. Laminates' exotic range
						of decorative laminates is characterized by higher color fastness and the best bonding
						properties with substrates available in the market today. Laminates is a product from the
						house of Ply.

						Ply has been the front-runner in applying innovation at work. This simple philosophy has
						been the cornerstone of all our processes and technologies. It has led us to design and deliver
						contemporary lifestyle statements that have become synonymous with modern living. Our award
						winning products have been redefining Indian realty and bringing about a paradigm shift in the
						concept of living spaces.  Plyboards (I) Ltd. (CPIL), our mother concern, came into
						existence in 1986 as a result of the foresightedness of two visionaries, Mr. Sajjan Bhajanka and
						Mr. Sanjay Agarwal. Since then, the company has taken giant strides and is today, the largest
						seller of multi-use plywood and decorative veneers in the Indian organized plywood market.
					</p>

					<p class="stext-113 cl6 p-b-26">
						Any questions? Let us know in store at 8th floor, 379 orelly flats, Bopal, A'bad 10018 or call
						us on (+91) 96716 68790
					</p>
				</div>
			</div>

			<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
				<div class="how-bor1 ">
					<div class="hov-img0">
						<img src="{{ asset('user/images/about-01.jpg') }}" alt="IMG">
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('visitor.footer')

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
	<script src="{{ asset('user/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
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
	<script src="{{ asset('user/js/main.js') }}"></script>
</body>

@endsection