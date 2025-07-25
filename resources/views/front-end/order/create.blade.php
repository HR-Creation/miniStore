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

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src="{{ asset($product->image) }}" alt="" width="100%" class="">
                    </div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Place Order</h1>
                            </div>
                            <form class="user" action="{{route('orders.store') }}" method="post">
                                @csrf 
                                
                                @if(Session::get('customerId'))
                                    <input type="hidden" name="customer_id" value="{{Session::get('customerId')}}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="quantity" value="{{$quantity}}">

                                    <div class="form-group">
                                    <label> <b> Product Name </b> </label>
                                        <input type="text" name="product_name" class="form-control form-control-user"
                                            Value="{{$product->title}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label> <b> Price </b> </label>
                                        <input type="text" class="form-control form-control-user"
                                            Value="{{$product->price}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label> <b> Quantity </b> </label>
                                        <input type="text" class="form-control form-control-user"
                                            Value="{{$quantity}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label> <b> Total Amount </b> </label>
                                        <input type="text" class="form-control form-control-user"
                                            Value="{{$product->price * $quantity}}" disabled style="font-size: 20px; color: red;">
                                    </div>

                                    @foreach($customers as $customer)
                                        @if($customer->id == Session::get('customerId'))
                                        <div class="form-group">
                                            <label> <b> Your Phone: </b> </label>
                                            <input type="text" name="phone" class="form-control form-control-user"
                                                 Value="{{$customer->phone}}" require>
                                        </div>

                                        <div class="form-group">
                                            <label> <b> Your Address: </b> </label>
                                            <input type="text" name="address" class="form-control form-control-user"
                                                 Value="{{$customer->address}}" require>
                                        </div> <br>
                                        @endif
                                    @endforeach                                   

                                    <button type="submit"  class="btn btn-success btn-user btn-block d-grid mx-auto">
                                    Place Order
                                </button> 
                                                                
                                @else
                                <h2 class="text-danger"> Please <a href="{{ route('customer.login') }}">Login</a> of <a href="{{ route('customer.singup') }}">Register</a> for Order </h2>
                                @endif 
                                
                                <hr>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
