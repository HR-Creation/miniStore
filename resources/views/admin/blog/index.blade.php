@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Product</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Product Database</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Title</th>
                            <th>Category</th>                            
                            <th>Image</th>
                            <th>price</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $product->title }}</th>
                            <th>{{ $product->category->name }}</th>                            
                            <th><img src="{{ $product->image  }}" alt="Not Uploded" width="100%"></th>
                            <th>{{ $product->price}}</th>
                            <th>{{ $product->description }}</th>

                            <th>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</th>
                            <th>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm flex mt-1">Edit</a>
                                @if($product->status == 1)
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary btn-sm flex mt-1"> Inactive </a>
                                @else
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm flex mt-1">Active</a>
                                @endif

                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
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
