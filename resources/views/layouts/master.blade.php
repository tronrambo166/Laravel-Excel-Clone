

{{-- 
@if(Session::get('user_id')==''))
@php
 header("Location: " . URL::to('/'), true, 302);
        exit(); @endphp
   
@else 

@endif
--}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Store </title>
  <meta name="description" content="Demo | Demo Admin">
  <meta name="author" content="Demo Web Development - https://domain">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

 <!-- include('layouts.partials.styles') -->

  @yield('styles')

</head>

<body class="adminbody">

  <div id="mains">

    <!-- top bar navigation 
    include('layouts.partials.nav') 
     End Navigation -->


    <!-- Left Sidebar 
      include('layouts.partials.sidebar') 
     End Sidebar -->


    <div class="main">

      <!-- Start content -->
      <div class="content">

        <div class="container-fluid">

          @section('content')
          @show


        </div>
        <!-- END container-fluid -->

      </div>
      <!-- END content -->

    </div>
    <!-- END content-page -->

<!--  include('layouts.partials.footer') -->

  </div>
  <!-- END main -->

 <!-- include('layouts.partials.scripts')

 yield('scripts')  -->


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 <script src="resizeable.js" type="text/javascript"> </script>

</body>
</html>
