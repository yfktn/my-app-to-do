@section("content")
<div class="container">

@if(isset($todo))
    {{ Form::model($todo, array(
            'method'=>'post',
            'url'=>route('todo/store'), 'role'=>'form')) }}
@else
    {{ Form::open(['role'=>'form']) }}
@endif

<div class="form-group">
    {{Form::label('title', 'Judul')}}
    {{Form::text('title', Input::old('title'), array('class'=>'form-control'))}}
</div>
<div class="form-group">
    {{Form::label('description', 'Penjelasan')}}
    {{Form::textArea('description', Input::old('description'), array('class'=>'form-control'))}}
</div>
<div class="form-group">
    {{Form::label('type', 'Status Item')}}
    {{Form::select('type', \Panatau\MyAppToDo\Storage\AppTodoModel::$enum_type, Input::old('type'), array('class'=>'form-control'))}}
</div>
{{Form::submit("Tetapkan ", array("class"=>"btn btn-default btn-primary"))}}
{{ Form::close() }}

</div>
@stop

