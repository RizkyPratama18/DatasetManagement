@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Task') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/task/save') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_task" class="col-md-4 col-form-label text-md-right">Name Task</label>

                            <div class="col-md-6">
                                <input id="name_task" type="text" class="form-control @error('name') is-invalid @enderror" name="name_task"  >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Dataset</label>

                            <div class="col-md-6">
                                <select data-placeholder="Select dataset" name="id_dataset" id="id_dataset" class="form-control chosen-select select-chosen">
                                    @foreach($dataset as $data)
                                    <option value="{{$data->id_dataset}}">{{$data->name_dataset}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
