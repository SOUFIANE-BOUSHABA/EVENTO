@extends('layout.appUser')
@section('content')
<div class="container">
    <div class="row py-5 mt-4 align-items-center justify-content-between">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Login to Your Account</h1>
        </div>

        <div class="col-md-6 col-lg-6 ml-auto">
            <form action="{{route('store.forgot.password')}}" method="post">
                @csrf
                
                <div class="row">

                    <div class="input-group col-lg-12 mb-4">
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">send link</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
