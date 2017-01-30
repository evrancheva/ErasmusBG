@extends('layouts.admin')

@section('title', '| Edit banner')


@section('content')

    <div class="row">

      {!! Form::model($banner, ['route' => ['admin.banners.update', $banner->id], 'method' => 'PUT', 'files' => true]) !!} 
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-md-offset-3 col-md-6">
            <h1>{!!$banner->name!!}</h1>
            <p> Size : {!!$banner->width!!} x {!!$banner->height!!} </p>
             <div>
                <img src="{{asset("/images/")}}/{!!$banner->image!!}" class="thumb ">
            </div>
              {!! Form::label('banner',"Replace banner :") !!}
                {!! Form::file('banner') !!}
                  {!! Form::label('link', 'Link:') !!}
            {!! Form::text('link', null, ["class" => 'form-control input-lg input-circle']) !!}
            {!! Form::label('active', 'Active:') !!}
            {!! Form::checkbox('active', $value) !!}
            {!! Form::submit('Еdit banner', array('class'=>'btn btn-circle btn-outline btn-block blue margin'))!!}

        {!! Form::close() !!}

    </div>  <!-- end of .row (form) -->
 </div>
</div>
@stop

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/ajax.js') !!}
    
    var token = '{!! Session::token()!!}';

    </script>

@endsection