@extends('layout.appUser')
@section('content')
<div class="container">
    <div class="row py-5 mt-4 align-items-center justify-content-between">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Login to Your Account</h1>
        </div>

        <div class="col-md-6 col-lg-6 ml-auto">
            <form action="{{route('login.user')}}"  onsubmit="return login(event);" method="post" id="Lform">
                @csrf

                <div class="row">

                    <div class="input-group col-lg-12 mb-4">
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12 mb-4">
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="form-group col-lg-12 mb-4">
                        <a href="{{route('forget.password')}}" class="text-primary">Forgot Password?</a>
                    </div>

                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Login</span>
                        </button>
                    </div>

                    <div class="mt-4 w-100">
                        <p class="text-muted font-weight-bold">Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-2">Register</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<script>
    window.onload = function () {
        @if(Session::has('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: "success",
                title: "{{ Session::get('success') }}"
            });
        @endif
        @if(Session::has('error'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: "success",
                title: "{{ Session::get('error') }}"
            });
        @endif
    }


    function login(event) {
        event.preventDefault(); 
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        if (email == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email is required!',
            });
            return false;
        } else if (password == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password is required!',
            });
            return false;
        } else {
            document.getElementById('Lform').submit();
        }
    }
</script>

@php
    Session::forget('success');
@endphp


@endsection
