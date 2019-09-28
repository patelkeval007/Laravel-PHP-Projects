  <!-- Header -->
  <header class="header-v4">
  	<!-- Header desktop -->
  	<div class="container-menu-desktop">
  		<!-- Topbar -->
  		<div class="top-bar">
  			<div class="content-topbar flex-sb-m h-full container">
  				<div class="left-top-bar">
  					Free shipping for standard order over $100
  				</div>
  				@if (Route::has('login'))
  				<div class="right-top-bar flex-w h-full">

  					@auth
  					<a href="{{ url('/home') }}" class="flex-c-m trans-04 p-lr-25">
  						Home
  					</a>
  					@else
  					<a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">
  						Login
  					</a>

  					@if (Route::has('register'))
  					<a class="flex-c-m trans-04 p-lr-25" href="{{ route('register') }}">
  						Register
  					</a>
  					@endif
  					@endauth

  				</div>
  				@endif
  			</div>
  		</div>
  		<div class="wrap-menu-desktop">
  			<nav class="limiter-menu-desktop container">

  				<!-- Logo desktop -->
  				<a href="{{ route('visitor') }}" class="logo">
  					<img src="{{ asset('user/images/icons/logo-01.png') }}" alt="IMG-LOGO">
  				</a>

  				<!-- Menu desktop -->
  				<div class="menu-desktop">
  					<ul class="main-menu">
  						<li class="active-menu">
  							<a href="{{ route('visitor') }}">Home</a>
  						</li>

  						<li>
  							<form method="post" action="{{route('v_product')}}">
  								@csrf
  								<button type="submit">Shop</button>
  							</form>
  						</li>

  						<li>
  							<a href="{{ route('v_about') }}">About</a>
  						</li>

  						<li>
  							<a href="{{ route('v_contact') }}">Contact</a>
  						</li>
  					</ul>
  				</div>

  				<!-- Icon header -->
  				<div class="wrap-icon-header flex-w flex-r-m">

  					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
  						<a class="zmdi zmdi-shopping-cart" href="{{route('login')}}"></a>
  					</div>

  				</div>
  			</nav>
  		</div>
  	</div>

  	<!-- Modal Search -->
  	<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
  		<div class="container-search-header">
  			<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
  				<img src="images/icons/icon-close2.png" alt="CLOSE">
  			</button>

  			<form class="wrap-search-header flex-w p-l-15">
  				<button class="flex-c-m trans-04">
  					<i class="zmdi zmdi-search"></i>
  				</button>
  				<input class="plh3" type="text" name="search" placeholder="Search...">
  			</form>
  		</div>
  	</div>
  </header>