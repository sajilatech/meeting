<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Meeting Update System</title>

    <link rel="canonical" href="">

    

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
    </style><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>MEETING UPDATE SYSTEM</title>

    <link rel="canonical" href="">

    

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
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    @auth
    <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
      <a class="nav-link px-3" href="/logout">Sign out</a>
      @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth
    </div>
  </div>
</header>

 <div class="container">
 <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">PlAN MEETING/span>
      </a>
      @auth
      <div class="col-md-3 text-end">
      <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
        <button type="button" class="btn btn-primary">Sign-Out</button>
      </div>
      @else
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div>
      @endauth
    </header>
  </div>
 
<div class="container-fluid">
@include("navigation");

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     <!--  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div> -->
    
      @auth
    
<form action="/plan_meeting" method="POST">
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
    <label for="staticEmail" class="col-sm-2 col-form-label"><Title></Title></label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="title" id="staticEmail" value="{{old('title')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Location</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="location" id="staticEmail" value="{{old('location')}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Meeting with</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" name="with" id="staticEmail" value="{{old('with')}}">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Notes</label>
    <div class="col-sm-10">
      <textarea"  class="form-control-plaintext" name="employee_designation" id="staticEmail"> {{old('employee_designation')}}</textarea>
    </div>
  </div>

  @foreach($plan_list as $row)
  
  $employee_row=Employee::where('id',$attributes['employee_id'])->first();
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Not Busy Staff Name</label>
    <div class="col-sm-10">
   
    {{$this->nama= $employee_row->employee_name}};
    </div>
  </div>
  @endforeach
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
