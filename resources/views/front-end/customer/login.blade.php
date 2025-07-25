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
                                <h1 class="h4 text-gray-900 mb-4">Sing In</h1>
                            </div>
                            <form class="user" action="{{route('customer.login')}}" method="post">
                            <p class="text-danger">{{ Session('message').Session('customerName') }} </p>
                                @csrf 

                                    <div class="form-group">
                                        <label> <b> Email: </b> </label>
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                            placeholder="Your Email Address" require>
                                    </div>

                                    <div class="form-group">
                                        <label> <b> Password: </b> </label>
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="Your Passwood" require>
                                    </div> <br>

                                    <button type="submit"  class="btn btn-success btn-user btn-block d-grid mx-auto">
                                    Sing In
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


