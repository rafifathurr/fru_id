<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>FRU.ID - Login</title>
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="{{ asset('login/login.css') }}">
  <link rel="icon" href="{{ asset('img/fru.png') }}" type="image/x-icon" />
  <style>
    .input-icon{
    margin-bottom:20px;
    }
  </style>
</head>
<body>
 
 <div class="halaman">
  <div class="hal-login">
   <div class="container">
   <div class="detail-cont">
    <h2>Log in FRU.ID</h2>

    <p>Please log in using that account has
     registered on the website.</p>

   </div>
   <div class="form">
     <form action="{{route('login.authenticate')}}" method="post">
      {{ csrf_field() }}
    <label for="email">Email Address</label>
    <div class="input-icon">
     <input type="email" name="email" id="email" placeholder="Email" class="@error('email') is-invalid" @enderror placeholder="Your Email Address" autofocus required value="{{ old('email') }}">
     <i class="uil uil-envelope-alt"></i>
     
   </div>
   @error('email')
      <div class="invalid-feedback " style="color:red;">
        {{ $message }}
        </div>     
        <br>    
    @enderror
    @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show " role="alert" style="color:red;">
        {{ session('loginError') }}
      </div>
      <br>
   @endif
    <label for="password">Password</label>
    <div class="input-icon">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="uil uil-keyhole-circle"></i>
    </div>
    <a href="" style="text-align:right;"><i>Forgot Password</i> </a>
   </div>
   
   <br>
   <div class="button">
    <button type="submit">Log In</button>
   </div>
  </form>
  </div>

  </div>
 </div>
 
</body>
</html>