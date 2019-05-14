<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="PlatonicIT">
	<!-- For Google -->
    <meta name="description" content="Programas Solares" />
    <meta name="keywords" content="Programas Solares" />
    <meta name="copyright" content="Programas Solares" />
    <meta name="application-name" content="Programas Solares" />

<!-- For Facebook -->
    <meta property="og:title" content="Programas Solares" />
    <meta property="og:type" content="services" />
    <meta property="og:image" content="{{ asset('assets/images/default/programassolares.png') }}" />
    <meta property="og:url" content="https://programassolares.com" />
    <meta property="og:description" content="Programas Solares" />

<!-- For Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Programas Solares" />
    <meta name="twitter:description" content="Programas Solares" />
    <meta name="twitter:image"  content="{{ asset('assets/images/default/programassolares.png') }}" />

	<!-- Site Title -->
	<title>@yield('title','Inicio | Programas Solares')</title>

	<!-- Favicon Icon -->
	@if((isset(\App\Models\Setting::first()->favicon)))
	<link href="{{ asset('storage')."/".\App\Models\Setting::first()->favicon }}" rel="shortcut icon" type="image/ico">
	@else
	<link href="{{ asset('assets/images/default/favicon.ico') }}" rel="shortcut icon" type="image/ico">
	@endif
	
	
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
	<style>
		#progressbar li {
			width: calc(100%/{{\App\Models\Question::all()->count()}});
		}
		.invalid{pointer-events: none}
		[v-cloak] {
			display: none;
		}
		.question_paragraph {
			text-align: left;
			margin-top: 20px !important;
			font-size: 15px;
			padding: 0 8px;
		}
	</style>
	@stack('css')
	<style>
        .thank_you h1,h2,h4,h5,h6,strong{
        	margin-bottom: 15px;
        	color:#000000;
        }
	</style>
</head>
<body >
<div id="app" v-cloak>

@include('public.header.header')

@yield('content','')

@include('public.footer.footer')

	<!-- Modal -->
	<div  class="modal fade" id="surveyModal" tabindex="-1" role="dialog" aria-labelledby="surveyModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg-custom" role="document">
			<div class="modal-content">
				<div class="modal-header align-items-center">
					<!-- progressbar -->
					<ul id="progressbar">
						@if(\App\Models\Question::all()->count())
							@foreach(\App\Models\Question::all() as $question)
								<li class="
									@if($loop->index==0)
										active
									@endif">
									{{$question->question}}
								</li>
							@endforeach
						@endif
					</ul>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Multi step form -->
					<section class="multi_step_form">
						<form id="msform" action="{{route('survey')}}" method="POST">
							@csrf
							<!-- fieldsets -->
							@if(\App\Models\Question::all()->count())
								@foreach(\App\Models\Question::orderBy('id', 'asc')->get() as $question)
									<fieldset>
										<h3>{{$question->question}}</h3>
										<input type="hidden" name="zipcode" v-model="zipcode">

										<ul class="bills">
											@foreach($question->question_options as $option)
												@php
													if($option->option_type=='1'){
														$type = 'radio';
													}elseif($option->option_type=='2'){
														$type = 'text';
													}
												@endphp

												@if ($option->option_type != 4)
													<li class="radio">
														<label>
															<input
															@change="optionValid({{ $question->id }},{{ $option->id }})"
															@keyup="optionValid({{ $question->id }},{{ $option->id }})"
															placeholder="{{ $option->question_option }}"
															type="{{$type}}"

															@if($type=='text')
															v-model="text['{{ $option->id }}']"
															name="answer[{{$question->question}}][{{$type}}][{{$option->question_option}}]"

															@else
															v-model="option['{{ $question->id }}']"
															name="answer[{{$question->question}}][{{$type}}]"
															@endif

															@if($type=='radio')
															value="{{ $option->question_option }}"
															@endif >

															@if($type=='radio')
																{{ $option->question_option }}
															@endif
														</label>
													</li>
												@endif

												@if($option->option_type=='4')
													<p class="question_paragraph">{{ $option->question_option }}</p>
												@endif
											@endforeach
										</ul>

										@if($loop->index==0)
											<a class="action-button previous_button" href="{{url('/')}}">Anterio</a>
										@else
											<button @click.prevent="trueIsActive"  type="button"  class="action-button previous previous_button">Anterio</button>
										@endif
										@if($loop->last)
											{{-- <button  @click.prevent="finishSurvey" class="action-button">Someter</button> --}}
											
											 <button type="submit" :class="!isActive ? 'invalid' : 'valid' " class="action-button">Someter</button>
										@else
											<button @click.prevent="flaseIsActive" type="button" :class="!isActive ? 'invalid' : 'valid' "  class="next action-button">Continuar</button>
										@endif
									</fieldset>
								@endforeach
							@endif
						</form>
					</section>
					<!-- End Multi step form -->
				</div>
			</div>
		</div>
	</div>


	{{-- Finish Modal --}}
<!-- Modal -->
{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#surveyModalFinish">Open Modal</button> --}}
{{-- Cut Modal From Here --}}


</div>
<div>


	<!-- Vendor JS -->
	<script type="text/javascript" src="{{ asset('js/solar.js') }}"></script>
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