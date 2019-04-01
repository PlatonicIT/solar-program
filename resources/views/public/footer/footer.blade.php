
	<!-- Footer -->
	<footer class="footer-wrap">
		<div class="container">
			<div class="row align-items-center text-center justify-content-center">
				<div class="col-lg-6">
					<p class="copyright">&copy; <span id="date">
                        @if((isset(\App\Models\Setting::first()->copyright)))
					{{App\Models\Setting::first()->copyright }}
					@else
					Copyright {{\Carbon\Carbon::now()->year}} Solar Program All Rights Reserved
					@endif
						</span>
					</p>
				</div>

				<div class="col-lg-6 text-right">
					<ul class="footer-menu">
						<!-- <li><a href="{{url('/')}}">Home</a></li> -->
						@if(\App\Models\FooterMenuPage::all()->count())
							@foreach (\App\Models\FooterMenuPage::where('menu_position','bottom')->get() as $menu)
					<li><a target="_blank" href="{{route('view.page',[snake_case($menu->menu_name,'-'),$menu->id])}}">{{$menu->menu_name}}</a></li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- End of Footer -->