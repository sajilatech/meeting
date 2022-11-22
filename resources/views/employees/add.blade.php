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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CREATE NEW</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
        
          </div>
         
        </div>
      </div> 
    
  
    
<form action="/create_employee" method="POST">
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
      <input type="text"  class="form-control-plaintext" name="employee_name" id="staticEmail" value="{{old('employee_name')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Designation</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="employee_designation" id="staticEmail" value="{{old('employee_designation')}}">
    </div>
  </div>
  
   
  <button type="submit" class="btn btn-primary">Create</button>
    
    
  </form>
</main>
@else

@include("login");

@endauth
  
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

     
  </body>
</html>
