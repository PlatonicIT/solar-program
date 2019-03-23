@extends('public.master')

@push('js')

@endpush

@push('css')

<style>
.home_heading {
	color:#ffffff!important
}
.home_heading h1,h2,h3,h4,h5,h6,strong{
	margin-bottom: 15px;
	color:#ffffff !important
}

@if((isset(\App\Models\Setting::first()->background)))
	#app {
		background-image: url({{ asset('storage')."/".\App\Models\Setting::first()->background }})
	}
@else
	#app {
		background-image: url({{ asset('assets/images/default/banner-bg.jpg') }})
	}
@endif
</style>

@endpush

@section('title',"Home - Solar Program")

@section('content')
	<!-- Banner -->
	<section class="banner-wrap align-items-center" v-cloak>
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-lg-8">
				@if((isset(\App\Models\Setting::first()->heading)))
					<div class="home_heading">
					 {!!\App\Models\Setting::first()->heading!!}
					</div>
				@else
					<h3>
						<p>Find out if you qualify to get solar without any cost!</p>
						<p>It only takes 30 seconds.</p>
					</h3>
				@endif
					<div class="quote-box">
						
						@if(Session::get('success'))
							<p class="text-success" id="notice">{{Session::get('success')}}</p>
						@endif

						<p class="text-danger" v-if="error">@{{ error }} </p>

						<div class="zipCodeDiv">
							<input id="zipcode"  name="zipcode" v-model="zipcode" type="text" placeholder="Enter your zip code">
						</div>

						<button @click="surVey" type="button" class="button">Get Started</button>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Banner -->
@endsection