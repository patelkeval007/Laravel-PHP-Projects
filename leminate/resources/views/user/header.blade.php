<!-- Header -->
<header class="header-v4">
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="top-bar">
			<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
					{{-- Free shipping for standard order over $100 --}}
				</div>

				<div class="right-top-bar flex-w h-full">
					<a href="#" class="flex-c-m trans-04 p-lr-25">
						Help & FAQs
					</a>

					<a href="{{ route('show_myaccount') }}" class="flex-c-m trans-04 p-lr-25">
						My Account
					</a>

					<a class="flex-c-m trans-04 p-lr-25" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						Logout
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</div>
		</div>

		<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->
				<a href="{{ route('userhome') }}" class="logo">
					<img src="{{ asset('user/images/icons/logo-01.png') }}" alt="IMG-LOGO">
				</a>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="active-menu">
							<a href="{{ route('userhome') }}">Home</a>
						</li>

						<li>
							<form method="post" action="{{route('product')}}">
								@csrf
								<button type="submit">Shop</button>
							</form>
						</li>

						<li>
							<a href="{{ route('about') }}">About</a>
						</li>

						<li>
							<a href="{{ route('contact') }}">Contact</a>
						</li>
					</ul>
				</div>

				<!-- Icon header -->
				<div class="wrap-icon-header flex-w flex-r-m">

					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
						<a class="zmdi zmdi-shopping-cart" href="{{route('shoping_cart')}}"></a>
					</div>

				</div>
			</nav>
		</div>
	</div>
</header>