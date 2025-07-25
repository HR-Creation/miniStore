@extends('front-end.master')

@section('content')

<style>

.container {
    padding: 100px;
}

.img-card img {
  width: 100%;
  border-radius: 4px;
  height: auto;
  object-fit: cover;
  padding: 10px;
}

</style>

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Your Orders</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order database</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <h1 class="h3 mb-2 text-gray-800">Your All Orders</h1>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Order Date</th>                            
                            <th>Status</th>                            
                            <th>Date</th>                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $order->blog->title }}</th>                          
                            <th>{{ $order->quantity }}</th>                          
                            <th>{{ date('j-M-y / h:i', strtotime($order->created_at)) }}</th>                          
                            <th style="font-size:20px; color:green;">{{ $order->status == 1 ? 'New' : ($order->status == 2 ? 'Confirmed' : ($order->status == 3 ? 'Send' : 'Deliveried') ) }}</th>                          
                            <th>{{ date('j-M-y / h:i', strtotime($order->updated_at)) }}</th>
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
