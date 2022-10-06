
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
<style>
.show {
  z-index: 1000;
  position: absolute;
  background-color: #C0C0C0;
  border: 1px solid blue;
  padding: 2px;
  display: block;
  margin: 0;
  list-style-type: none;
  list-style: none;
}

.hide {
  display: none;
}

.show li {
  list-style: none;
}

.show a {
  border: 0 !important;
  text-decoration: none;
}

.show a:hover {
  text-decoration: underline !important;
}

td {border: 1px #DDD solid; padding: 5px; }

.selected {
    background-color: brown;
    color: #FFF;
}

 </style>

</head>

<body class="adminbody">

  <div id="mains">
<style>
*{box-sizing: border-box;}
table{border-collapse:collapse;}
td,th{padding:5px 15px;text-align:left;}
table,th,td{border:1px solid #000;}
</style>

<table id="tableId">
 <thead>
  <tr>
 
   <th id="0" name="">Size</th>
   <th id="1" name="">File</th>
   <th id="2" name="">File</th>
  </tr>
 </thead>
 <tbody>
  <tr>
   
   <td>10Mb</td>
   <td>C:\Users\BrainBell</td>
   <td>10Mb</td>
  </tr>
 </tbody>
</table>
   


    <div class="main">

      <!-- Start content -->
      <div class="content">


<div id="test" class=" bg-warning p-5">
  <a  class="test">Google</a>
  <a href="" class="test">Link 2</a>
  <a href="" class="test">Link 3</a>
  <a href="" class="test">Link 4</a>
</div>

<!-- initially hidden right-click menu -->
<div class="hide" id="rmenu">
  <ul>
    <li>
      <a href="http://www.google.com">Google</a>
    </li>

    <li>
      <a href="http://localhost:8080/login">Localhost</a>
    </li>

    <li>
      <a href="C:\">C</a>
    </li>
  </ul>
</div>
        <!-- END container-fluid -->

      </div>
      <!-- END content -->

    </div>
    <!-- END content-page -->

 

  </div>
  <!-- END main -->

 


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="ColReorderWithResize.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_id').DataTable();
} );
$(table).DataTable({
    'lengthMenu': [[10, 25, 50, 100], [10, 25, 50, 100]],
    'ordering': false,
    'processing': true,
    'serverSide': true,
    'autoWidth': false,
    'dom': 'Blfrtip',
    'ajax': {
        'url': 'ajax.php',
        'type': 'GET'
    },
    'columns':[
        {'data': 'id', 'title': 'Id'},
        {'data': 'A', 'title': 'A'},
        {'data': 'B', 'title': 'C'},
        {'data': 'C', 'title': 'D'},
        {'data': 'D', 'title': 'E'}
    ]
});
</script>



<script>
    // Menu on Right Click
$(document).ready(function() {


  if ($("#test").addEventListener) {
    $("#test").addEventListener('contextmenu', function(e) {
      alert("You've tried to open context menu"); //here you draw your own menu
      e.preventDefault();
    }, false);
  } else {

    //document.getElementById("test").attachEvent('oncontextmenu', function() {
    //$(".test").bind('contextmenu', function() {
    $('body').on('contextmenu', '.test', function() {


      //alert("contextmenu"+event);
      document.getElementById("rmenu").className = "show";
      document.getElementById("rmenu").style.top = mouseY(event) + 'px';
      document.getElementById("rmenu").style.left = mouseX(event) + 'px';

      window.event.returnValue = false;


    });
  }

});

// this is from another SO post...  
$(document).bind("click", function(event) {
  document.getElementById("rmenu").className = "hide";
});



function mouseX(evt) {
  if (evt.pageX) {
    return evt.pageX;
  } else if (evt.clientX) {
    return evt.clientX + (document.documentElement.scrollLeft ?
      document.documentElement.scrollLeft :
      document.body.scrollLeft);
  } else {
    return null;
  }
}

function mouseY(evt) {
  if (evt.pageY) {
    return evt.pageY;
  } else if (evt.clientY) {
    return evt.clientY + (document.documentElement.scrollTop ?
      document.documentElement.scrollTop :
      document.body.scrollTop);
  } else {
    return null;
  }
}

  // Menu on Right Click
  </script>  



  <script type="text/javascript">
     // Select cell
   /*   
      var table = document.getElementById('table_id'),
    selected = table.getElementsByClassName('selected');
table.onclick = highlight;
function highlight(e) {
    if (selected[0]) selected[0].className = '';
    e.target.className = 'selected';
}
function fnselect(){
var $row=$(this).parent().find('td');
    var clickeedID=$row.eq(0).text();
    alert(clickeedID); 
}*/
// Select cell

  </script>
}

  <script src="resizeable.js" type="text/javascript"> </script>

	
</body>
</html>
