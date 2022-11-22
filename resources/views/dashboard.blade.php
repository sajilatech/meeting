

<script src="http://code.jquery.com/jquery-latest.js"></script>

<script>

document
    .getElementById('filechoice')
    .addEventListener(
        'change',
        function () {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('contents').textContent = this.result;
            };
            fr.readAsText(this.files[0]);
        }
    );
/*     $(document).ready(function(){
        setInterval(function() {
            $("#latestData").load("getLatestData.php #latestData");
        }, 10000);
    });
 */
</script>
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
@if(auth()->user()->type==1)


@include("navigation");
@else
@include("user_navigation");
@endif






    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
    <input type="file" id="filechoice" />
    
</main>

      </div>

      

      




      
  </body>
</html>
