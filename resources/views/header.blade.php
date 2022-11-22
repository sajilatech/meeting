<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Buffel & Bag AB</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    @auth
    <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>
     
      @else
                    
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
       
      </a>
      @auth
      <div class="col-md-3 text-end">
      <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span></br>
      <a href="{{url('logout/')}}" ><img src="assets/brand/icons8-sign-out.gif" height="30px;" width="30px;"></a>
      </div>
      @else
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
       
      </div>
      @endauth
    </header>
  </div>