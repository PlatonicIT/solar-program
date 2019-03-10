<h1 style="text-align: center">ZipCode => {{$survey->zipcode}}</h1>
<div class="container faq_section">
    @foreach($survey->survey as $key=>$answer)
    <div class="FaQ_Each">
        <section class="box">
		  	<span>
		  		<i class="fa fa-plus" aria-hidden="true"></i>
		  		<i class="fa fa-minus" id="other" aria-hidden="true"></i>
		  	</span>
            &nbsp;&nbsp;<span>{{$key}}</span>
        </section>
        <section class="draw">
            @isset($answer['radio'])
                <h3 >{{ $answer['radio']}}</h3>
            @endisset
            @isset($answer['text'])
                @foreach($answer['text'] as $itemkey=>$item)
                    <h3>{{$itemkey}} => {{$item}}</h3>
                @endforeach
            @endisset
        </section>
    </div>
    @endforeach
</div>

<script>
    $(document).ready(function(){
        $(".box").click(function(){
            $(this).next().slideToggle("fast");
            $(this).find('i').toggle();
        });
    });
</script>