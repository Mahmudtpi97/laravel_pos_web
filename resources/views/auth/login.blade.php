
@extends('layouts.primary')
@section('title','POS Website - Login')
@section('auth_body')

    <!-- Nested Row within Card Body -->
    <div class="row">
        {{-- <div class="col-lg-5 d-none d-lg-block bg-login-image"></div> --}}
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login a Account</h1>
                </div>

                <form class="user" action="{{route('login.confirm')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="exampleInputPhone">Phone: </label>
                            <input type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone"  id="exampleInputPhone"
                            placeholder="Phone Number">
                            @error('phone')
                                <div class="invalid-feedback d-block" role="alert">{{'Phone Number is required'}}</div>
                            @enderror
                    </div>
                    <div class="form-group row">
                            <label for="exampleInputPassword">Password: </label>
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                                id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback d-block" role="alert">{{'Password is required'}}</div>
                               @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="{{route('registration')}}">Registration an Account</a>
                </div>

            </div>
        </div>
    </div>
@stop

