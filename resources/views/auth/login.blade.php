@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card p-5">
                    <form action="{{route('account.login.store')}}" method="post">
                        @csrf
                    <div class="text-center ">
						<h4 class="">
							Login
						</h4>
                    </div>
                     <div class="form-group mt-5">
                      <label for="email">Email:</label>
                      <input type="text"
                        class="form-control" name="email" id="email"  placeholder="admin@gmail.com" value="{{old('email')}}">
                        
                    </div> <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password"
                    class="form-control" name="password" id="password"   placeholder="123456">
                        
                    </div> 
                    @if (session('error'))
                        <small class="text text-danger">{{session('error')}}</small>
                    @endif
                    <div class="text-center mt-3 mb-3 ">
                        <button type="submit" class="btn btn-primary w-50">Login</button>
                    </div>
                    <div class="text-center ">
						<span class="txt1">
							Don’t have an account?
						</span>
                    <a class="" href="{{route('account.register')}}">Sign Up</a>
                    </div>
                    <div class="text-center">
						<span class="txt1">
							Forgot password?
						</span>
						<a class="" href="">Reset</a>
                    </div>
                    
                </form>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection
