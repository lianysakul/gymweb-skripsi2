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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5 text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>
                                    <form action="{{ url('forgot_post') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="email" value="{{ old('email') }}" class="form-control form-control-user" required name="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group"> 
                                            <button type="submit" value="reset" class="btn btn-primary btn-user btn-block">
                                                Reset Password
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('registration') }}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('login') }}">Already have an account? Login!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('/') }}">Welcome Page</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection