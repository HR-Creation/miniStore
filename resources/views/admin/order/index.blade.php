@extends('admin.master')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Order</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Order Database</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product Name</th>                           
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Amount</th>
                            <th>Order Date</th>
                            <th>Customer Name</th>
                            <th>Current Phone</th>
                            <th>Current Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $order->blog->title }}</th>                                                       
                            <th><img src="{{ $order->blog->image  }}" alt="Not Uploded" width="100%"></th>
                            <th>{{ $order->quantity }}</th>
                            <th>{{ $order->blog->price }}</th>
                            <th>{{ $order->quantity * $order->blog->price }}</th>
                            <th>{{ date('j-M-y / h:i', strtotime($order->created_at)) }}</th>

                            <th>{{ $order->customer->name }}</th>
                            <th>{{ $order->current_phone }}</th>
                            <th>{{ $order->current_address }}</th>

                            <th>{{ $order->status == 1 ? 'New' : ($order->status == 2 ? 'Confirmed' : ($order->status == 3 ? 'Product Send' : 'Delivered') ) }}</th>
                            <th>
                                @if($order->status == 1)
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary btn-sm flex mt-1"> Confirmed </a>
                                @elseif($order->status == 2)
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-warning btn-sm flex mt-1">Send</a>
                                @else($order->status == 3)
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-success btn-sm flex mt-1">Delivered</a>
                                @endif
        
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