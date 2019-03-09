
	<!-- Navigation -->
	<nav class="nav-wrap">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-3">
					<a href="{{url('/')}}" class="logo">
					@if((isset(\App\Models\Setting::first()->logo)))
					<img src="{{ asset('storage')."/".\App\Models\Setting::first()->logo }}" alt="Logo">
					@else
					<img src="{{ asset('assets/images/default/logo.png') }}" alt="Logo">
					@endif
					</a>
				</div>

				<div class="col-md-9 text-right">
					<ul class="main-menu">
						<li><a href="./">home</a></li>
						<li><a href="#">about</a></li>
						<li><a href="#">contact</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Mobile Menu -->
		<div class="mobile-menu"></div>
		<!-- End of Mobile Menu -->
	</nav>
	<!-- End of Navigation -->
