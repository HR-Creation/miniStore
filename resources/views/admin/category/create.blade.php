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
                                <h1 class="h4 text-gray-900 mb-4">Create Category</h1>
                            </div>
                            <form class="user" action="{{ route('categories.store') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control">Category Name</label>
                                    <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail"
                                           placeholder="Category Name">
                                </div>

                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                    Submit
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
