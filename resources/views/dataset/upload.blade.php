@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Data Set</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ url('/dataset/save') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name_dataset" class="col-md-4 col-form-label text-md-right">Name Dataset</label>

                            <div class="col-md-6">
                                <input id="name_dataset" type="text" class="form-control @error('name_dataset') is-invalid @enderror" name="name_dataset"  >

                                @error('name_dataset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="file"  accept=".zip,.7zip" class="form-control-file" name='dataset' id="dataset" >
                                @error('datset')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
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
