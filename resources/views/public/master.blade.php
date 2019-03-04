
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="csesumonpro">

	<!-- Site Title -->
	<title>@yield('title','Home - This is your site title')</title>

	<!-- Favicon Icon -->
	<link href="{{ asset('assets/img/favicon.png') }}" rel="shortcut icon" type="image/png">
	
	<!-- Google Fonts -->
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300i,400,400i,500,700,900">
	<!-- Vendor CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.min.css') }}">

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">

	<!-- Style CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms.css') }}">	
	<!-- Style CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">	
	<!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/developer.css') }}">
    @stack('css')
</head>
<body>
@include('public.header.header')
@yield('content')
@include('public.footer.footer')
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg-custom" role="document">
			<div class="modal-content">
			<div class="modal-header align-items-center">
				<!-- progressbar -->
				<ul id="progressbar">
					<li class="active">How much is your average monthly electric bill?</li>
					<li>How much sun does your roof get?</li>
					<li>How much sun does your roof get?</li>
					<li>How much sun does your roof get?</li>
					<li>How much sun does your roof get?</li>
				</ul>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<!-- Multi step form -->
				<section class="multi_step_form">
					<form id="msform" action="{{route('test')}}" method="POST">
                        @csrf
						<!-- fieldsets -->
						<fieldset>
							<h3>How much is your average monthly electric bill?</h3>

							<ul class="bills">
								<li class="radio active">
									<label><input type="radio" name="optradio" checked>$0 - $100</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$101 - $200+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="optradio">$201 - $300+</label>
								</li>
							
								
							</ul>

							<button type="button" class="action-button previous_button">Back</button>
							<button type="button" class="next action-button">Continue</button>
						</fieldset>
						<fieldset>
							<h3>How much sun does your roof get?</h3>
							
							<ul class="bills">
								<li class="radio active">
									<label><input type="radio" name="roof-get" checked>Full sun most of the day</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Partially Shaded</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Shaded most of the day</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Not sure</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Not sure</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Not sure</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Not sure</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="roof-get">Not sure</label>
								</li>

							</ul>
							
							<button type="button" class="action-button previous previous_button">Back</button>
							<button type="button" class="next action-button">Continue</button>
						</fieldset>
						<fieldset>
							<h3>Do you own your home?</h3>
							
							<ul class="bills">
								<li class="radio active">
									<label><input type="radio" name="own-home" checked>Yes, I own my home.</label>
								</li>
								<li class="radio">
									<label><input type="radio" name="own-home">No, I do not own my home.</label>
								</li>
							</ul>
							
							<button type="button" class="action-button previous previous_button">Back</button>
							<button type="button" class="next action-button">Continue</button>
						</fieldset>
						<fieldset>
							<h3>What is your name?</h3>
							
							<div class="form-inner">
								<input type="text" name="f_name" placeholder="First Name">
								<input type="text" name="l_name" placeholder="Last Name">
							</div>
							
							<button type="button" class="action-button previous previous_button">Back</button>
							<button type="button" class="next action-button">Continue</button>
						</fieldset>
						<fieldset>
							<h3>What is your address?</h3>
							
							<div class="form-inner">
								<input type="text" name="address" placeholder="Street Address">
								<input type="text" name="zip" placeholder="Zip Code">
							</div>
							
							<button type="button" class="action-button previous previous_button">Back</button>
							<button type="button" class="next action-button">Continue</button>
						</fieldset>
						<fieldset>
							<h3>What is your contact info?</h3>
							
							<div class="form-inner">
								<input type="text" name="phone" placeholder="Phone Number">
								<input type="email" name="email" placeholder="Email Address">
	
								<p class="mt-3 text-left">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, facilis voluptate? Omnis, voluptates, modi consequatur libero repudiandae deserunt exercitationem laboriosam ea voluptatem eius, labore cumque illo at aliquid alias quas!</p>
							</div>
							
							<button type="button" class="action-button previous previous_button">Back</button>
							{{--  <a href="#" class="action-button">Finish</a>  --}}
							<button type="submit" class="action-button">Finish</a>
						</fieldset>
					</form>
				</section>
				<!-- End Multi step form -->
				
			</div>
			</div>
		</div>
	</div>
  

	<!-- Vendor JS -->
	<script type="text/javascript" src="{{ asset('assets/js/vendor.min.js') }}"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Forms Scripts -->
	<script type="text/javascript" src="{{ asset('assets/js/form.js') }}"></script>
	<!-- Custom Scripts -->
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Code injected by live-server -->
    <script type="text/javascript" src="{{ asset('assets/js/svgsupport.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/developerjs.js') }}"></script>
    
    @stack('js')
   
    


</body>
</html>