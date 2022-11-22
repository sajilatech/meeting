@include("header_top");

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
  @include("header");
  <div class="container-fluid">
  @include("navigation");
  @auth

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
   
    
    
    
<form action="/update_employee" method="POST">
@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="employee_name" id="staticEmail" value="{{$employee_row->employee_name}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Designation</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="employee_designation" id="staticEmail" value="{{$employee_row->employee_designation}}">
    </div>
  </div>
  
   
  <button type="submit" class="btn btn-primary">Create</button>
    
    
  </form>
</main>
@else
<main class="form-signin">
<form action="/login" method="POST">
    <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    @csrf
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif -->
    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" value="{{old('name')}}"placeholder="Email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

    <div class="checkbox mb-3">
      <label>
       <a href="/register"><b>REGISTER</b></a>
      </label>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>

    </main>@endauth
  
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

     
  </body>
</html>
