@extends('layouts.main')
@section('title','| Contact')
@section('content')
<div class="container">
     <span class="titleOfarticle">Пиши ни</span>
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-offset-3 col-md-6 form2 margin-top-bottom">
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
    </div>
      </div>
@endsection