@include("header_top");
    <script>
      function confirmAction(){
        var proceed = confirm("Are you sure you want to proceed?");
              if (proceed) {
                return true;
              } else {
                return false;
              }
      }
      </script>

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
        <h1 class="h2">VIEW EMPLOYEES</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <a href="{{url('create_employee/')}}" ><button class="button button4"><img src="assets/brand/icons8-add.png" height="30px;" width="30px;"></button>
          </div>
         
        </div>
      </div> 
 
      

      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Designation</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($employee_list as $row)
            <tr>
              <td>{{ $row['id']}}</td>
              <td>{{ $row['employee_name']}}</td>
              <td>{{ $row['employee_designation']}}</td>
              <td><a href="{{url('edit/'.$row['id'])}}" ><img src="assets/brand/icons8-edit.png" width="20px;" height="20px;"></a></td>
              <td><a href="{{url('delete/'.$row['id'])}}" onclick="return confirmAction()"><img width="20px;" height="20px;" src="assets/brand/icons8-delete-30.png"></a></td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
@else
@include("auth.login");
@endauth
