@extends('admin.master')

@section('content')

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                            </div>
                            <form class="user" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label> <b>  Name of Product </b> </label>
                                    <input type="text" name="title" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Title Shown for The Product" require>
                                </div>                        

                                <div class="form-group">
                                    <label> <b> Category of Product </b> </label>
                                    <select name="category_id" class="form-control">
                                        <option> Select Product Catagory </option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>                        

                                <div class="form-group">
                                    <label> <b> Image of Product </b> </label>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail"
                                           placeholder="Category Name" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label> <b> Price for Product </b> </label>
                                    <input type="number" name="price" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Price Value" require>
                                </div>

                                <div class="form-group">
                                    <label> <b> Description of Product </b> </label>
                                    <textarea type="text" name="description" class="form-control form-control-user" id="exampleInputEmail"></textarea>
                                </div>

                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                    ADD
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
