@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                                                                       href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $category->name }}</th>
                            <th>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</th>
                            <th>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                @if($category->status == 1)
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary btn-sm"> Inactive </a>
                                @else
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning btn-sm">Active</a>
                                    @endif

                                <form action="{{ route('categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm flex mt-1">Delete</button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


    @endsection
