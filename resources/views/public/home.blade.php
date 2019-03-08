@extends('public.master')
@push('js')

@endpush
@push('css')
  <style>
    .banner-wrap{background-image: url({{ asset('assets/images/default/banner-bg.jpg') }})}
  </style>
@endpush
@section('title',"Home")
@section('content')
    <!-- Banner -->
    <section class="banner-wrap" style="">
        <div class="container">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-lg-8">
                    <h3>Compare quotes from up to four local home service companies.</h3>
                    <div class="quote-box">
                        <p>Start your project today!</p>
                        <p class="text-danger" v-if="this.error">@{{ this.error.zipcode }} </p>
                        <input id="zipcode"  name="zipcode" v-model="zipcode" type="text" placeholder="Enter your zip code">
                        <button @click="surVey()" type="button" class="button" data-toggle="modal" :data-target="!validate ? '#exampleModal': '' ">Get Quotes</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->
@endsection