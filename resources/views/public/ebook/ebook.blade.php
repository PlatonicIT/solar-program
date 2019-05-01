
@extends('public.master')

@section ('title', env('EBOOK_TITLE'))

@push('css')
<style>
    .ebook{margin-top: 50px}
    .ebook_img img{margin-bottom: 20px}
    .dynamic h1,h2,h4,h5,h6,strong{
	margin-bottom: 15px;
	color:#000 !important
    }
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
    
    @if((isset(\App\Models\Setting::first()->background)))
    	#app {
    		background-image: url({{ asset('storage')."/".\App\Models\Setting::first()->background }})
    	}
    @else
    	#app {
    		background-image: url({{ asset('assets/images/default/banner-bg.jpg') }})
    	}
    @endif
    #app::after {
        opacity: 0.6;
    }
</style>
@endpush
@push('js')

    
@endpush
@section('content')
   <div class="container ebook">
       <div class="row align-items-center">
            <div class="col-md-6 col-sm-6 col-lg-6 text-right order-sm-2">
                <div class="ebook_img">
                         
            @if((isset(\App\Models\Ebook::first()->ebook_image)))
            <img src="{{ asset('storage/'.\App\Models\Ebook::first()->ebook_image) }}" alt="Descarga Aquí">
            @else
            <img src="{{ asset('assets/images/default/ebook.png') }}" alt="Descarga Aquí">
            @endif
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 col-lg-6">
                @if((isset(\App\Models\Ebook::first()->ebook_page_text)))
                <div class="dynamic">
                    {!!\App\Models\Ebook::first()->ebook_page_text!!}
                </div>
                @else
                <div class="static">
                        <h2>10 MITOS SOBRE PANELES SOLARES</h2>
                        <h3>QUE USTED DEBE CONOCER ANTES DE COMPRAR</h3>
                        <div class="gigzug"></div>   
                        <p>
                            Descargue esta guía gratuita y aprenda
                            el verdadero costo de cambiarse a energía solar.
                        </p>  
                    </div>
                @endif
                <div class="download_btn">
                    @if((isset(\App\Models\Ebook::first()->ebook_url)))
                <a href="{{asset('storage/'.\App\Models\Ebook::first()->ebook_url)}}" class="btn btn-info">
                        @if((isset(\App\Models\Ebook::first()->ebook_button_text)))
                      {{\App\Models\Ebook::first()->ebook_button_text}}
                        @else
                        Descarga Aquí
                        @endif
                    </a>
                    @else
                    <a href="#" class="btn btn-info">
                        @if((isset(\App\Models\Ebook::first()->ebook_button_text)))
                      {{\App\Models\Ebook::first()->ebook_button_text}}
                        @else
                        Descarga Aquí
                        @endif
                    </a>
                    @endif

                </div>
            </div>
       </div>
   </div>
@endsection