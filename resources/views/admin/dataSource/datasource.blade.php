@extends('admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>New Data Source
                        <!-- <a href="{{ url('category') }}" class="btn btn-primary btn-sm  text-white float-end">Back</a> -->
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('datasource/upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">CSV Upload</label>
                                <input type="file" name="csvfile" class="form-control">
                                @error('csvfile') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">XML Upload</label>
                                <input type="file" name="xmlfile" class="form-control">
                                @error('xmlfile') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">XLS Upload</label>
                                <input type="file" name="xlsfile" class="form-control">
                                @error('xlsfile') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">JSON Upload</label>
                                <input type="file" name="jsonfile" class="form-control">
                                @error('jsonfile') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary text-white">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection