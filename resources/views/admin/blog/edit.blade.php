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
                                <h1 class="h4 text-gray-900 mb-4">Update Product Info</h1>
                            </div>
                            <form class="user" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                <label> <b>  Name of Product </b> </label>
                                    <input type="text" value="{{ $product->title }}" name="title" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Category Name">
                                </div>               

                                <div class="form-group">
                                <label> <b> Category of Product </b> </label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label> <b> Image of Product </b> </label> <br>
                                    <img src="{{ asset($product->image) }}" alt="Image Not Uploded" width="200px"> <br>
                                    <input type="file" name="image" class="form-control" id="exampleInputEmail"
                                           placeholder="Category Name" accept="image/*">
                                </div>

                                <div class="form-group">
                                <label> <b> Price for Product </b> </label>
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Category Name">
                                </div>

                                <div class="form-group">
                                <label> <b> Description of Product </b> </label>
                                    <textarea type="text" name="description" class="form-control form-control-user" id="exampleInputEmail">{{$product->description}}</textarea>
                                </div>

                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                    Update
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
