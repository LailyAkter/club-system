@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input 
                                            type="email"
                                            class="form-control form-control-user  @error('email') is-invalid @enderror"
                                            aria-describedby="emailHelp" 
                                            placeholder="Enter Email Address..."
                                            name="email" 
                                            value="{{ old('email') }}" 
                                        />
                                        @if($errors->has('email'))
                                        <span class='invalid-feedback'>Email is Required</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input 
                                            type="password" 
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" 
                                            placeholder="Password"
                                            name="password"
                                        />
                                        @if($errors->has('password'))
                                        <span class='invalid-feedback'>Password is Required</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                    <a href="login/github" class="btn btn-primary btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Github
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('password.update')}}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('register')}}">Create an Account!</a>
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