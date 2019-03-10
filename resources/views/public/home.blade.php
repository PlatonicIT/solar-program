@extends('public.master')
@push('js')

@endpush
@push('css')
  <style>
  .home_heading {color:#ffffff!important}
  .home_heading h1{color:#ffffff !important}
  @if((isset(\App\Models\Setting::first()->background)))
    .banner-wrap{background-image: url({{ asset('storage')."/".\App\Models\Setting::first()->background }})}
    @else
   .banner-wrap{background-image: url({{ asset('assets/images/default/banner-bg.jpg') }})}
    @endif
   
  </style>
@endpush
@section('title',"Home - Solar Program")
@section('content')
    <!-- Banner -->
    <section class="banner-wrap" style="">
        <div class="container">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                @if((isset(\App\Models\Setting::first()->heading)))
                    <div class="home_heading">
                     {!!\App\Models\Setting::first()->heading!!}
                    </div>
                @else
                    <h3>Compare quotes from up to four local home service companies.</h3>
                @endif    
                    <div class="quote-box">
                        <p>Start your project today!</p>
                        @if(Session::get('success'))
                          <p class="text-success">{{Session::get('success')}}</p>
                        @endif
                        <p class="text-danger" v-if="this.error">@{{ this.error.zipcode }} </p>
                        <input @keyup="surVey" id="zipcode"  name="zipcode" v-model="zipcode" type="text" placeholder="Enter your zip code">
                        <button  type="button" class="button" data-toggle="modal" v-if="validate && zipvalid" data-target="#exampleModal">Get Quotes</button>
                        <button @click="surVey" type="button" class="button"  v-else >Get Quotes</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->
@endsection