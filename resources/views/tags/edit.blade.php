@extends('layouts.user')
@section('title' ,' | Edit Post')
@section('content')
    <div class="row">
        {!! Form::model($tag,['route'=>['tags.update',$tag->id],'method' => 'PUT']) !!}
        <div class="col-md-8">
            {!! Form::label('name','Title:') !!}
            {!!  Form::text('name',null,["class"=>"form-control input-circle"])!!}
            
            {!! Form::submit('Save Changes',['class' =>'btn btn-circle btn-outline btn-block blue '])!!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('scripts')
<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
@stop

