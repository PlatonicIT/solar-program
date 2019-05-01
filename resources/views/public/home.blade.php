@extends('public.master')

@push('js')

@endpush

@push('css')

<style>
.home_heading {
	color:#ffffff!important
}
.home_heading h1,h2,h4,h5,h6,strong{
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

@section('title',"Inicio | Programas Solares")

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
						Descubra si califica para paneles solares sin costo alguno!
					</h3>
				@endif
					<div class="quote-box">
						@if(Session::get('success'))
						<div  class="" id="surveyModalFinish" tabindex="-1" role="dialog" aria-labelledby="surveyModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg-custom" role="document">
							<div class="modal-content">
								<div class="modal-header align-items-center">
									
									<a  href="{{url('/')}}" type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</a>
								</div>
								<div class="modal-body">
									<div class="thank_you">
											<img src="/assets/images/logo.png"/>
											@if((isset(\App\Models\Setting::first()->thank_you_message)))
											{!!\App\Models\Setting::first()->thank_you_message!!}
											@else
											<h4 class="text-center" style="color:#000!important">Thank you for your interest in Solar Security! </h4>
											<p class="text-justify">
													We have already received your information and we are assigning one of our experts who will contact you as soon as possible: We ask you to keep an eye on the phone. 
													We invite you to watch our videos and learn about the solar experience of people like you.
											</p>
											@endif

											<div class="text-center">
											<a href="{{route('ebook')}}" class="btn btn-primary">
													@if((isset(\App\Models\Setting::first()->button_text)))
													{!!\App\Models\Setting::first()->button_text!!}
													@else
													Download A Free Ebook
													@endif
													
												</a>
											</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
						
					@else	
						<p class="text-danger" v-if="error">@{{ error }} </p>
                        <p>Solo toma 30 segundos</p>
						<div class="zipCodeDiv">
							<input id="zipcode"  name="zipcode" v-model="zipcode" type="text" placeholder="Ingrese su codigo postal">
						</div>

						<button @click="surVey" type="button" class="button">Empezar</button>
					@endif	
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End of Banner -->
@endsection