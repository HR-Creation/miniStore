@extends('front-end.master')

@section('content')

<style>

.product-container {
    padding: 100px;
}

.img-card img {
  width: 100%;
  border-radius: 4px;
  height: auto;
  object-fit: cover;
  padding: 10px;
}

.small-Card {
  display: flex;
  justify-content: start;
  align-items: center;
  margin-top: 15px;
  gap: 12px;
}

.small-Card img {
  width: 104px;
  height: 104px;
  border-radius: 4px;
  cursor: pointer;
}

.small-Card img:active {
  border: 1px solid #17696a;
}

.sm-card {
  border: 2px solid darkred;
}

.product-info{
  width: 60%;
}
.product-info h3 {
  font-size: 32px;
  font-family: Lato;
  font-weight: 600;
  line-height: 130%;
}

.product-info h5 {
  font-size: 24px;
  font-family: Lato;
  font-weight: 500;
  line-height: 130%;
  color: #ff4242;
  margin: 6px 0;
}

.product-info del {
  color: #a9a9a9;
}

.product-info p {
  color: #424551;
  margin: 15px 0;
  width: 70%;
}

.sizes p {
  font-size: 22px;
  color: black;
}

.size-option {
  width: 200px;
  height: 30px;
  margin-bottom: 15px;
  padding: 5px;
}

.quantity input {
  width: 51px;
  height: 33px;
  margin-bottom: 15px;
  padding: 6px;
}

button {
  background: #17696a;
  border-radius: 4px;
  padding: 10px 37px;
  border: none;
  color: white;
  font-weight: 600;
}

button:hover {
  background: #ff4242;
  transition: ease-in 0.4s;
}

.delivery {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 70%;
  color: #787a80;
  font-size: 12px;
  font-family: Lato;
  line-height: 150%;
  letter-spacing: 1px;
}

hr {
  color: #787a80;
  width: 58%;
  opacity: 0.67;
}

.pagination {
    color: #787a80;
    margin: 15px 0;
    cursor: pointer;
}

</style>


<!-- product section -->
<section class="product-container">
    <div class="container">
        <div class="row mx-10">
            <div class="col-md-6">
                <div class="img-card">
                    <img src="{{asset($product->image)}}" alt="" id="featured-image">           
                </div>
            </div>          
            <div class="col-md-6">
                <div class="product-info">
                <h3>{{$product->title}}</h3>
                <p> {{$product->description}} </p>
                <h5>Price: {{$product->price}} ৳</h5>       
                <form action="{{route('order') }}" method="post">
                  @csrf
                  <div class="quantity">
                      <p>Quantity:</p>
                      <input type="hidden" name="product_id" value="{{$product->id}}">
                      <input name="quantity" type="number" value="1" min="1" ><br>
                      <button type="submit"  class="btn btn-primary btn-user btn-block">
                          Order Now
                      </button>
                  </div>
              </form>
                <div>
                    <p>Delivery:</p>
                    <p>We will contact You in Sort Time. After Confirming the Order Delivery within 1-7 days.
                        <span style="color:red;"> Free Home Delivery in Dhaka!</span> </p>
                    <hr>    
                </div>
            </div>
            </div>
        </div>
    </div>
        
    </section>

@endsection
