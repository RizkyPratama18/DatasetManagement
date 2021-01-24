@extends('layouts.appAdmin')
@section('title')
    Task List
@endsection
@section('content')
<div class="container">
 <div class="panel panel-default">
    @if(count($data))
    <div class="table-responsive">
        <table class="table table-bordered table-striped
          table-hover table-condensed tfix"><thead align="center"><tr>
            <td><b>ID TASK</b></td>
            <td><b>DESCRIPTION</b></td>
            <td><b>STATUS</b></td>
            <td><b>USER</b></td>
            <td colspan="2"><b>MENU</b></td></tr></thead>
            @foreach($data as $m)
                <tr>
                    <td>{{ $m->id_task }}</td>
                    <td>{{ $m->name_task }}</td>
                    <td>{{ $m->status }}</td>
                    <td>{{ $m->id_user }}</td>
                    <td align="center" width="30px">
                    <a href="{{ url('/task/delete',$m->id_task) }}" class="btn btn-danger btn-sm" role="button"><i class="fa fa-pencil-square"></i> Delete</a>
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
