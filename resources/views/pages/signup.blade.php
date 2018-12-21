<html>
  <head>
@include('include.link')
 </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Register Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>User Register</h2>
   <p>Please enter your information</p>
   </div>
    <form action="{{ URL::to('register-store') }}" method="post" id="Login">
      {{ csrf_field() }}
      
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div> 
        @endif

        @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
       @endif
        <div class="form-group">
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email Address">
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <div class="form-group">
            <input name="confirmpassword" type="password" class="form-control" id="inputPassword" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p style="color: black;" class="botto-text">Already have an account? <a href="{{ URL::to('login') }}">Login Now</a></p>
    </div>
</div>
</div>
</body>
</html>