@extends('layouts.auth', ['title' => 'Login'])

@section('content')
   <div class="card">
      <div class="card-header">Login</div>
      <div class="card-body">
         @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
         @endif
         <form action="/login" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control @error('username')is-invalid @enderror" required>
                @error('username')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('name')is-invalid @enderror" required>
                @error('password')
                  <span class="invalid-feedback">{{$message}}</span>
                @enderror

                <div class="form-group d-flex justify-content-between">
                  <div class="form-group-check">
                     <input type="checkbox" name="remember" id="remember">
                     <label for="remember">Remember Me</label>
                  </div>
                  <div>
                     <a href="forgot-password">Forgot password</a>
                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary w-100 mt-3">Login</button>
            
            <div class="text-center mt-4">
               Don't have account? <a href="/register">Register</a>
            </div>
        </form>
      </div>
   </div>
@endsection