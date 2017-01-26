<div class="container">
@if(Session::has('success'))
         <div class="alert alert-success margin">
                <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@if(count($errors)>0)
    <div class="alert alert-danger margin">
     
        <ul>
          @if(!Session::has('message'))
                @foreach($errors->all() as $error)

                        <li>
                            {{$error}}
                        </li>

                    @endforeach
            @endif
           @if(Session::has('message'))
                <li >{{ Session::get('message') }}</li>
            @endif
            </ul>

    </div>
    @endif
    </div>