@extends('public.master')
@push('js')
    <script>
       var zipcode =  document.getElementById('zipcode').value;
       document.write(zipcode);
    </script>
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
                        <input id="zipcode" name="zipcode" type="text" placeholder="Enter your zip code">
                        <button type="button" class="button" data-toggle="modal" data-target="#exampleModal">Get Quotes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Banner -->
@endsection