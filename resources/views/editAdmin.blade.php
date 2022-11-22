<    @include("header_top");

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
    
<form action="/update_password" method="POST">
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
      <input type="text"  class="form-control-plaintext" name="name" id="staticEmail" value="{{old('name')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="email" id="staticEmail" value="{{old('email')}}">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="password" id="staticEmail" value="{{old('password')}}">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
    
    
  </form>
</main>
@else

@include("login");

@endauth
  
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

     
  </body>
</html>
