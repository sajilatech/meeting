<    @include("header_top");
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
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

   <!--=========================  datetimepicker =================-->

   <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="timepicker/jquery.timepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="timepicker/jquery.timepicker.css" />
	<script type="text/javascript" src="timepicker/documentation-assets/bootstrap-datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="timepicker/documentation-assets/bootstrap-datepicker.css" />
	<script type="text/javascript" src="timepicker/documentation-assets/site.js"></script>
	<link rel="stylesheet" type="text/css" href="timepicker/documentation-assets/site.css" />
    

   

    <!------------------------- date time picker end ------------------------>
  <script>
    function check_time_validation(){
      var timeto=$('#timeTo').val();
      var timefrom=$('#timeFrom').val();
        if(timefrom>timeto){
            alert('start time should be smaller')
        }
    }
  </script>
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
    
     
    
<form action="/assign_task" method="POST">
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
    <label for="staticEmail" class="col-sm-2 col-form-label">Employee</label>
    <div class="col-sm-10">
      <select  class="form-control-plaintext" name="employee_id" id="staticEmail">
        <option value="0">--Employees--</option>
        @foreach($employee_list as $row)
        <option value="{{ $row['id']}}">{{ $row['employee_name']}}</option>
        @endforeach
      </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Task</label>
    <div class="col-sm-10">
      <textarea  class="form-control" name="task"> {{old('task')}}</textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Start time</label>
    <div class="col-sm-10">
    <input id="timeFrom" type="text" class="form-control" name="starttime" />
				
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">End time</label>
    <div class="col-sm-10">
    <input id="timeTo" type="text" class="form-control" ' name="endtime" />
    
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Create</button>
    
    
  </form>
</main>

  
</div>
<script>
 $('#timeTo').timepicker({
	'minTime': '08:00am',
	'maxTime': '03:30pm',
	'showDuration': true
});

$('#timeFrom').timepicker({
	'minTime': '08:00am',
	'maxTime': '03:30pm',
	'showDuration': true
});
</script> 
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    

     
  </body>
</html>
@else
@include("auth.login");
@endauth