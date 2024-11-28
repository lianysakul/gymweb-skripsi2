@extends('homepages.app')

@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center min-vh-100">

            <div class="col-xl-6 col-lg-8 col-md-10"> <!-- Mengatur kolom agar lebih sempit -->

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0 d-flex justify-content-center"> 
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center align-items-center w-100"> 
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5 text-center"> 
                                    <h1 class="h4 text-gray-900 mb-4">Welcome to NewHeat Pro!</h1>
                                    <a href="{{ url('login')  }}" class="btn btn-primary btn-user btn-block">
                                        Enter
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
