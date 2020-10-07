@extends('layouts.app')

@section('content')

     <div class="admin-login">
          
          <div class="form-box">
               
               <form method="POST" action="{{ route('adminLogin') }}" class="text-center">
                    
                    <h1 class="text-center"> Admin Login </h1>
                    @csrf
                    <!-- Name Field-->
                    <div class="form-group">
                         <input type="text" name='username' placeholder="Type Username..." class="form-control" required="required" value="{{ old('username') }}" autocomplete="off"  />
                    </div>
                    @error('username')
                         <small class="form-text text-danger">{{$message }}</small> <!-- message is var in laravel -->
                    @enderror

                    <!-- Password Field-->
                    <div class="form-group">
                         <input type="password" name='password' placeholder="Type Password..." class="form-control" required="required" autocomplete="new-password"  />
                    </div>
                    @error('password')
                         <small class="form-text text-danger">{{$message }}</small> <!-- message is var in laravel -->
                    @enderror

                    <br>
                    <!-- Submit Button-->
                    <button type="submit" name="loginBtn"> Login <i class="fas fa-sign-in-alt"></i>  </button>

               </form>

          </div>

     </div>


@endsection
