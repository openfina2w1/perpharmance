@extends('admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('category/create') }}" class="btn btn-primary btn-sm text-white float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-boarded table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tboby>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ url('category/'.$category->id.'/edit') }}" class="btn btn-success text-white">Edit</a>
                                        <a href="" class="btn btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tboby>
                    </table>  
                    <div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection