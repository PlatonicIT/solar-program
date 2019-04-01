<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="csesumonpro">

	<!-- Site Title -->
	<title>@yield('title','Home - Solar Program')</title>

	<!-- Favicon Icon -->
	@if((isset(\App\Models\Setting::first()->favicon)))
	<link href="{{ asset('storage')."/".\App\Models\Setting::first()->favicon }}" rel="shortcut icon" type="image/png">
	@else
	<link href="{{ asset('assets/images/default/favicon.png') }}" rel="shortcut icon" type="image/png">
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
	#app{background: #ffffff}
	</style>
	@stack('css')
	<style>
.thank_you h1,h2,h4,h5,h6,strong{
	margin-bottom: 15px;
	color:#000000 !important
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
											<a class="action-button " href="{{url('/')}}">back</a>
										@else
											<button @click.prevent="trueIsActive"  type="button"  class="action-button previous previous_button">Back</button>
										@endif
										@if($loop->last)
											<button  @click.prevent="finishSurvey" class="action-button">Finish</button>
										@else
											<button @click.prevent="flaseIsActive" type="button" :class="!isActive ? 'invalid' : 'valid' "  class="next action-button">Continue</button>
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
<div  class="modal fade" id="surveyModalFinish" tabindex="-1" role="dialog" aria-labelledby="surveyModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg-custom" role="document">
			<div class="modal-content">
				<div class="modal-header align-items-center">
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="thank_you">
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