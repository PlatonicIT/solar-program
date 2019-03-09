
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
    </style>
    @stack('css')
</head>
<body>
<div id="app">
@include('public.header.header')
@yield('content','')

@include('public.footer.footer')
	<!-- Modal -->
	<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							@foreach(\App\Models\Question::latest()->get() as $question)
								<fieldset>
							<h3>{{$question->question}}</h3>
							<input type="hidden" name="question[{{$question->id}}]" value="{{$question->question}}">
								<input type="hidden" name="zipcode" v-model="zipcode">
							<ul class="bills">
								@foreach($question->question_options as $option)
								@php
									if($option->option_type=='1'){
										$type = 'radio'
									}elseif($option->option_type=='2'){
										$type = 'text'
									}
								@endphp
								<li class="radio">
									<label><input type="{{$type}}"  name="option[{{$question->id}}]" value="{{$option->question_option}}" >{{$option->question_option}}</label>
								</li>
								
								@endforeach
							</ul>
							@if($loop->index==0)
                            <a class="action-button " href="{{url('/')}}">back</a>

							@else
							<button type="button"  class="action-button previous previous_button">Back</button>
							@endif
                            @if($loop->last)
                                <button type="submit" class="action-button">Finish</button>
                            @else
                                <button type="button" class="next action-button">Continue</button>
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
	
</div>
  

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