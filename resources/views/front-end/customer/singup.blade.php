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
                        <img src="{{asset('front-end-assets/assets')}}/images/login.gif" alt="" width="100%" class="">
                    </div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Sing Up</h1>
                            </div>
                            <form class="user" action="{{route('customer.singup')}}" method="post">
                                @csrf 

                                    <div class="form-group">
                                    <label> <b> Name: </b> </label>
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleInputName"
                                         placeholder="Your Name is Require" require>
                                    </div>

                                    <div class="form-group">
                                        <label> <b> Email: </b> </label>
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Your Email Address is Require" require>
                                    </div>

                                    <div class="form-group">
                                        <label> <b> Password: </b> </label>
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Password Must Contain 8 Character" require>
                                    </div> <br>

                                    <button type="submit"  class="btn btn-primary btn-user btn-block d-grid mx-auto">
                                    Sing Up
                                </button>                                
                                <hr>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


