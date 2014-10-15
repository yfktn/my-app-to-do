@section('content')
<div class="container">

	{{ Form::open(array(
                'method'=>'post',
                'url'=>route('todo/reset-status', array('id'=>$todo->id)), 'role'=>'form', 'class'=>'form-horizontal')) }}
    <div class="form-group">
        {{Form::label('status', 'Progess Saat Ini')}}
        {{Form::select('status',\Panatau\MyAppToDo\Storage\AppTodoModel::$enum_status,
            Input::old('status', $todo->status_pure),
            array('class'=>'form-control'))}}
    </div>
    {{Form::submit("Tetapkan Progress", array("class"=>"btn btn-default btn-primary"))}}
	{{ Form::close() }}
</div>
@stop