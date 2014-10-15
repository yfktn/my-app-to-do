{{-- ini harus dipanggil dari induk dan bersifat child of the another view 
    membutuhkan pemanggilan Todo::getStatistic()
--}}
<table class="table table-striped">
    <tr>
        <th>Status</th>
        <th>Jumlah</th>
    </tr>
    @foreach($stat as $s)
    <tr>
        <td>{{ \Panatau\MyAppToDo\Storage\AppTodoModel::$enum_status[$s->status] }}</td>
        <td>{{ $s->cnt_type }}</td>
    </tr>
    @endforeach
</table>