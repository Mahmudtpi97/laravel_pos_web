
@extends('layouts.primary')
@section('title','POS Website - Registeration')
@section('auth_body')

                <!-- Nested Row within Card Body -->
                <div class="row">
                    {{-- <div class="col-lg-5 d-none d-lg-block bg-login-image"></div> --}}
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register a Account</h1>
                            </div>

                            <form class="user" action="{{route('registration.confirm')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleName">Name: </label>
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror " name="name" id="exampleName" placeholder="First Name" value="{{old('name')}}">
                                        @error('name')
                                            <div class="invalid-feedback d-block" role="alert">{{'Name is required'}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleInputPhone">Phone: </label>
                                        <input type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" name="phone"  id="exampleInputPhone"
                                        placeholder="Phone Number" value="{{old('phone')}}">
                                        @error('phone')
                                            <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="exampleInputEmail">Email: </label>
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email"  id="exampleInputEmail"
                                        placeholder="Email Address" value="{{old('email')}}">
                                        @error('email')
                                            <div class="invalid-feedback d-block" role="alert">{{'Email is required'}}</div>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleInputPassword">Password: </label>
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                                            id="exampleInputPassword" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback d-block" role="alert">{{'Password is required'}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="exampleConPassword">Confirm Password: </label>
                                        <input type="password" class="form-control form-control-user @error('confirm_password') is-invalid @enderror" name="confirm_password"
                                            id="exampleConPassword" placeholder="Confirm Password">
                                            @error('confirm_password')
                                            <div class="invalid-feedback d-block" role="alert">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Registration</button>

                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>

                        </div>
                    </div>
                </div>
@stop

