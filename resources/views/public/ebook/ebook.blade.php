
@extends('public.master')
@push('css')
<style>

    .ebook{margin-top: 50px}
    .dynamic h1,h2,h4,h5,h6,strong{
	margin-bottom: 15px;
	color:#000 !important
}
   .download_btn{text-align: center}
    .download_btn a{
    color: #2ea3f2;
    text-decoration: none;
    font-weight: 700!important;
    position: relative;
    padding: .3em 1em;
    border: 2px solid;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    background-color: transparent;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    font-size: 20px;
    font-weight: 500;
    line-height: 1.7em!important;
    }
    .static p{color: #52B3E7;line-height: .8cm;font-size: 24px}
    .gigzug{border-bottom:3px dashed #7EBEC5;margin:50px auto}
</style>
@endpush
@push('js')

    
@endpush
@section('content')
   <div class="container ebook">
       <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                @if((isset(\App\Models\Ebook::first()->ebook_page_text)))
                <div class="dynamic">
                    {!!\App\Models\Ebook::first()->ebook_page_text!!}
                </div>
                @else
                <div class="static">
                        <h2>
                                <span style="color:#004DA1">10 MYTHS ON SOLAR PANELS </span>
                              
                        </h2>
                        <h3>
                               
                               <span style="color:#FF9300"> THAT YOU SHOULD KNOW BEFORE PURCHASING</span>
                        </h3>
                        <div class="gigzug">
                        </div>   
                        <p>
                                Download this free guide and learn 
                                the true cost of switching to solar energy.
                        </p>  
                    </div>
                @endif
                <div class="download_btn">
                    @if((isset(\App\Models\Ebook::first()->ebook_url)))
                <a href="{{asset('storage/'.\App\Models\Ebook::first()->ebook_url)}}" class="btn btn-info">
                        @if((isset(\App\Models\Ebook::first()->ebook_button_text)))
                      {{\App\Models\Ebook::first()->ebook_button_text}}
                        @else
                        Download Here
                        @endif
                    </a>
                    @else
                    <a href="#" class="btn btn-info">
                        @if((isset(\App\Models\Ebook::first()->ebook_button_text)))
                      {{\App\Models\Ebook::first()->ebook_button_text}}
                        @else
                        Download Here
                        @endif
                    </a>
                    @endif

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
            <img src="{{ asset('assets/images/default/ebook.png') }}" alt="Download a free ebook">
            </div>
       </div>
   </div>
@endsection