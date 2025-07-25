@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Customer</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Customer Database</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Phone</th>                            
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $customer->name }}</th>
                            <th>{{ $customer->phone }}</th>
                            <th>{{ $customer->email }}</th>
                            <th>{{ $customer->address }}</th>                            

                            <th>{{ $customer->status == 1 ? 'Active' : 'Inactive' }}</th>
                            <th>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm flex mt-1">Edit</a>
                                @if($customer->status == 1)
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-secondary btn-sm flex mt-1"> Inactive </a>
                                @else
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-warning btn-sm flex mt-1">Active</a>
                                @endif

                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
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
