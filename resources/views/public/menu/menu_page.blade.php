<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<!-- Favicon Icon -->
	@if((isset(\App\Models\Setting::first()->favicon)))
	<link href="{{ asset('storage')."/".\App\Models\Setting::first()->favicon }}" rel="shortcut icon" type="image/ico">
	@else
	<link href="{{ asset('assets/images/default/favicon.ico') }}" rel="shortcut icon" type="image/ico">
	@endif
    <title>{!!$menu->menu_title!!}</title>
    <style>
        body{width: 70%;margin: 3% auto;position: relative;}
       .heading{margin: 3% auto;}
        .title { width: 60%;} 
        .close {
            position: absolute;
            width: 10%;
             right: 0%;
             margin-top: -30px;
            } 
        .close a{ color: #777;
             border-bottom: 1px solid #777;
            text-decoration: none;
            font-size: 1em;
            text-transform: uppercase;
        }
        .main_content{margin:20px auto;}
        .footer{ text-align: center;}
        .footer a{ 
            color: #777;
            text-decoration: none;
            font-size: 2em;
            text-transform: uppercase;
            border-bottom: 1px solid #777;
            }
    </style>
</head>
<body>
   <section class="heading">
        <div class="title">
            <h1> {!!$menu->menu_title!!} </h1>
        </div>
        <div class="close">
            @if($menu->menu_position=='top')
             <a  href="{{url('/')}}">Inicio</a>
            @else
              <a  href="#"  onclick="self.close()">Inicio</a>
            @endif
        </div>
   </section>
  <section>
        <div class="main_content">
             {!!$menu->menu_body!!}
        </div>
  </section>
  <section >
        <div class="footer">
              @if($menu->menu_position=='top')
            <a  href="{{url('/')}}">Inicio</a>
            @else
              <a  href="#"  onclick="self.close()">Inicio</a>
            @endif
        </div>
  </section>
  
</body>
</html>
