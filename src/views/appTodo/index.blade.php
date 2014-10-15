@section("content")
<div class="container">
    <h1>Daftar TODO</h1>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penjelasan</th>
            <th>Jenis</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($todo as $t)
        <tr class='{{ $t->statusPure=='done'?'success':'warning' }}'>
            <td>{{ $t->title }}</td>
            <td>{{ $t->description }}</td>
            <td>{{ $t->type }}</td>
            <td><a href="{{ route('todo/reset-status', array('id'=>$t->id)) }}" title="Ubah Status">{{ $t->status }}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop