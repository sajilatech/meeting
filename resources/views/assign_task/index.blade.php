
      @include("header_top");
      @php use App\Models\Employee; @endphp
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
  </head>
  <body>
  
  @include("header");
  <div class="container-fluid">
  @if(auth()->user()->type==1)


@include("navigation");
@else
@include("user_navigation");
@endif
  @auth
  @if(auth()->user()->type==1)
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">VIEW ASSIGNED JOBS</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <a href="{{url('assign_task/')}}" ><img src="assets/brand/icons8-add.png" height="30px;" width="30px;">
          </div>
          
        </div>
      </div>
      
     
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Task</th>
              <th scope="col">Employee</th>
              <th scope="col">Date</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
          @foreach($task_list as $row)
          @php 
          
          $employee_row=Employee::where('id',$row['employee_id'])->first();
          @endphp
            <tr>
              <td>{{ $row['id']}}</td>
              <td>{{ Str::limit($row['task'], 50) }}</td>
              <td>{{  $employee_row->employee_name }}</td>
              <td>{{ $row['created_at']->format('Y/M/d')}}</td>
              <td><a href="{{url('edit_task/'.$row['id'])}}" ><img src="assets/brand/icons8-edit.png" width="20px;" height="20px;"></a></td>
              <td><a href="{{url('delete_task/'.$row['id'])}}" onclick="return confirmAction()"><img width="20px;" height="20px;" src="assets/brand/icons8-delete-30.png"></a></td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
@endif
@if(auth()->user()->type==0)
<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Task</th>
              
              <th scope="col">Date</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
          @foreach($task_list as $row)
            <tr>
              <td>{{ $row['id']}}</td>
              <td>{{ Str::limit($row['task'], 50) }}</td>
              
              <td>{{ $row['date']}}</td>
              <td><a href="{{url('view_task/'.$row['id'])}}" ><img src="assets/brand/icons8-view.png" width="20px;" height="20px;"></a></td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

@endif

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
@else

@include("login");

@endauth
