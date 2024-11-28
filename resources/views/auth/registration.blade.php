@extends('homepages.app')

@section('content')

    <div class="container">
        @include('_message')

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-xl-6 col-lg-8 col-md-10"> <!-- Mengatur kolom agar lebih sempit -->

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 d-flex justify-content-center align-items-center flex-column"> <!-- Center the content within card body -->
                        <!-- Nested Row within Card Body -->
                        <div class="p-5 w-100">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="{{ url('registration_post') }}" method="POST" class="w-100">
                                {{ csrf_field() }}
                                <div class="form-group row justify-content-center"> <!-- Center each row -->
                                    <div class="col-lg-10">
                                        <input type="text" value="{{ old('name') }}" class="form-control form-control-user" placeholder="Username" required name="name">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center"> <!-- Center each row -->
                                    <div class="col-lg-10">
                                        <input type="email" value="{{ old('email') }}" class="form-control form-control-user" placeholder="Email Address" required name="email">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center"> <!-- Center each row -->
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="password" value="" class="form-control form-control-user" placeholder="Password" required name="password">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" value="" class="form-control form-control-user" placeholder="Repeat Password" required name="repeat_password">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center"> <!-- Center each row -->
                                    <div class="col-lg-10">
                                        <select class="form-control" name="is_role" required>
                                            <option value="">Select Role</option>
                                            <option {{ old('is_role') == '2' ? 'selected' : ''}} value="2">Operator</option>
                                            <option {{ old('is_role') == '1' ? 'selected' : ''}} value="1">Admin</option>
                                            <option {{ old('is_role') == '0' ? 'selected' : ''}} value="0">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center"> <!-- Center each row -->
                                    <div class="col-lg-10">
                                        <button type="submit" value="registration" class="btn btn-primary btn-user btn-block">
                                            Register Account
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ url('forgot') }}">Forgot Password?</a>
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

@endsection
