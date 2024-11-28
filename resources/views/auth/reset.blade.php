@extends('homepages.app')

@section('content')

    <div class="container">
        @include('_message')

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-xl-6 col-lg-8 col-md-10"> <!-- Mengatur kolom agar lebih sempit -->

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center align-items-center w-100">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5 text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password Page</h1>
                                    <form action="{{ url('reset_post/'.$token) }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                required name ="password" placeholder="Enter Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" value="" class="form-control form-control-user"
                                                required name ="repeat_password" placeholder="Repeat Password">
                                        </div>
                                        <div class="form-group"> 
                                            <button type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block">
                                                Reset Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
