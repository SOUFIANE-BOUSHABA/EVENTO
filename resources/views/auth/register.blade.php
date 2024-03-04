@extends('layout.appUser')
@section('content')
<div class="container">
    <div class="row py-5 mt-4 align-items-center justify-content-between">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Create an Account</h1>
            
        </div>

        <div class="col-md-6 col-lg-6 ml-auto">
            <form action="#" me>
                <div class="row">

                    <div class="input-group col-lg-6 mb-4">
                       
                        <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-6 mb-4">
                     
                        <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12 mb-4">
                      
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-6 mb-4">
                      
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-6 mb-4">
                      
                        <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <a href="#" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Create your account</span>
                        </a>
                    </div>


                    <div class="mt-4 w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="{{ route('login') }}" class="text-primary ml-2">Login</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection