@extends('layouts.main')
@section('title','| About')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
            	<div class="col-md-7">
            			<span class="titleOfarticle">За нас</span>
            <h4>Целта на най-новото топ приложение е да направи така че хем Ели да се научи да програмира, хем пък да записва нещата, които Криси прави за Ели, защото глупавата Ели понякога ги забравя и нищо не и стига. Тя много съжалява за това и решила, че повече няма така да прави и ще се опитва да оценява повече нещата, които Криси прави именно чрез това приложение.</h4>
           
     <span class="titleOfarticle">Пиши ни</span>
    
            <div class=" col-md-12 form2 margin-top">
            <form action="{!! url('contact')!!}" method="POST">
                {!! csrf_field()!!}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" cols='10' rows='10' class="form-control" placeholder="Type your message here..."></textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-block btn-primary">
            </form>
       
    </div>
        </div>
        	<div class="col-md-5">
          <span class="titleOfarticle "><span class="text-hidden">fweomfwio</span></span>
             @foreach($posts as $post)
              <a href="{!! url('trips/'.$post->slug) !!}">
            <div class="row margin ">
                <div class="col-md-12 trip">
                    <div class="row">
                <div class="col-md-4">
                    <div class="category2">
                            <div class="cover2" style="dislay:none">
                                <div class="titleOfCategory2">
                                    <i class="fa fa-plane plane2" aria-hidden="true"></i>
                                    <div>{!! $post->title !!}</div>

                                </div>
                            </div>
                             <img src="{{asset("/images/")}}/{!! $post->image !!}" class="mainImageCategory img-responsive">
                        </div>
                </div>
                <div class="col-md-8">

                        <div class="title-product">
                            <strong>{!! $post->title !!}</strong>
                              <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> 
                                          {!! $post->location !!} 
                                          <br>
                                        <i class="fa fa-university" aria-hidden="true"></i>
                                          {!! $post->user->name !!}
                                          <br>
                                          <span class="red">
                                          <i class="fa fa-calendar" aria-hidden="true"></i> 
                                       {{date('d-m-Y',strtotime($post->start_date))}} до {{date('d-m-Y',strtotime($post->end_date))}}
                                      </span>
                                    </div>
                           
                        </div>
                        <br>
                        <div class="descr">
                        	 <div class="text2">
                         
                       </div>
                          
                                   <div class="line"></div>
                           <span class="read-more"> Read more </span>

                        </div>
                
                    </div>
                    
                </div>

            </div>
            </div>
        </a>
        @endforeach
        </div>
        </div>
        </div>
    </div>
</div>
</div>
@endsection