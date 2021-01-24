@extends('layouts.appUser')
@section('title')
    Task List
@endsection
@section('content')
<div class="container">
<h3>Available Task</h3>
 <div class="panel panel-default">
    @if(count($data1))
    <div class="table-responsive">
        <table class="table table-bordered table-striped
          table-hover table-condensed tfix"><thead align="center"><tr>
            <td><b>ID TASK</b></td>
            <td><b>DESCRIPTION</b></td>
            <td><b>STATUS</b></td>
            <td colspan="2"><b>MENU</b></td></tr></thead>
            @foreach($data1 as $m)
                <tr>
                    <td>{{ $m->id_task }}</td>
                    <td>{{ $m->name_task }}</td>
                    <td>{{ $m->status }}</td>
                    <td align="center" width="30px">
                    <a href="{{ url('/task/book',$m->id_task) }}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i>Book</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> There's no task
    </div>
    @endif
</div>
<br>
<br>

<h3>Pending Task</h3>
 <div class="panel panel-default">
    @if(count($haha))
    <div class="table-responsive">
        <table class="table table-bordered table-striped
          table-hover table-condensed tfix"><thead align="center"><tr>
            <td><b>ID TASK</b></td>
            <td><b>DESCRIPTION</b></td>
            <td><b>STATUS</b></td>
            <td colspan="2"><b>MENU</b></td></tr></thead>
            @foreach($haha as $m1)
                <tr>
                    <td>{{ $m1->id_task }}</td>
                    <td>{{ $m1->name_task }}</td>
                    <td>{{ $m1->status }}</td>
                    <td align="center" width="30px">
                    <a href="{{ url('/task/revoke',$m1->id_task) }}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i>Revoke</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> There's no task
    </div>
    @endif
</div>
<br>
<br>

<h3>Accepted Task</h3>
 <div class="panel panel-default">
    @if(count($data3))
    <div class="table-responsive">
        <table class="table table-bordered table-striped
          table-hover table-condensed tfix"><thead align="center"><tr>
            <td><b>ID TASK</b></td>
            <td><b>DESCRIPTION</b></td>
            <td><b>STATUS</b></td>
            <td colspan="2"><b>MENU</b></td></tr></thead>
            @foreach($data3 as $m)
                <tr>
                    <td>{{ $m->id_task }}</td>
                    <td>{{ $m->name_task }}</td>
                    <td>{{ $m->status }}</td>
                    <td align="center" width="30px">
                    <a href="{{ url('/task/dataset/download',$m->id_dataset) }}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i>Download</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
    <div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> There's no task
    </div>
    @endif
</div>

</div>
</div>
@endsection
