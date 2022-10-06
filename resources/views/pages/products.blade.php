@extends('layouts.master')

@section('content')


<div class="container-fluid">
<style>
.menuShow {
  z-index: 1000;
  position: absolute;
  background-color: aliceblue;
  border: 1px solid black;
  text-align: center;
  padding: 5px;
  display: block;
  margin: 0;
  list-style-type: none;
  list-style: none;
}

.hide {
  display: none;
}

.menuShow li {
  list-style: none;
}

.menuShow a {
  border: 0 !important;
  text-decoration: none;
  color: black;
}

.menuShow a:hover {
  text-decoration: underline !important;
}



  input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
 input[type=text]
{
  border: none; }
}
}

/*.table thead  tr th{padding: 5px 5px;} .table tbody  tr td{padding: 3px 3px;} */
<style>


.hide {
  display: none;
}

.menuShow li {
  list-style: none;
}

.menuShow a {
  border: 0 !important;
  text-decoration: none;
}

.menuShow a:hover {
  text-decoration: underline !important;
}

td {border: 1px #DDD solid; padding: 2px; }

.selected {
    background-color: brown;
    color: #FFF;
}

/*
*{box-sizing: border-box;}
table{border-collapse:collapse;}
td,th{padding:5px 15px;text-align:left;}
table,th,td{border:1px solid #000;} */

 </style>

</head>

<!-- End of Style -->

<!-- initially hidden right-click menu -->
<div class=" w-25 bg-light text-center hide" id="rmenu">
  <ul style="padding: 15px 15px;">
    <li style="border: 1px solid;">
      <a href="{{route('add_product')}}">Add row</a>
    </li>

    <li style="border: 1px solid; margin-top:20px;">
      <a href="{{route('column')}}">Add column</a>
    </li>

    
  </ul>
</div>






<!-- initially hidden right-click menu -->


  <div class="col-lg-12">
    <div class="row mb-4 mt-4">
      <div class="col-md-12">
        
      </div>
    </div>






    <div class="row">
      <!-- FORM Panel -->

      <!-- Table Panel -->
      <div class="col-md-12">
        <div class="cards">
          
             
       
          <div class="card-body">
             
          <form autocomplete="off" action="{{route('search')}}" method="post" class=" d-inline" > @csrf

     <input class="d-inline form-control w-25 " type="search" name="searchName" placeholder="Search by Item name or supplier" /> 
      <input style=" background:;border-radius: 20px; font-size: 14px; "
      type="submit"class=" d-inline my-4  btn btn-outline-info text-dark font-weight-bold "  name="search" value="Search" />
    
    </form> 

    <a style="margin-left: 50px;font-size: 13px;" data-toggle="modal" data-target="#columns"  class="btn px-1 py-0 btn-small btn-outline-success delete_member" data-id="">+ Supplier</a>
    


 <table id="" style="width:max-content; border-collapse: collapse;" class="display  table-bordered table-condensed table-hover"> 
             
            <!--   -->
<form action="{{route('col_up')}}" method="post" style="width:max-content;" > @csrf 
              <thead style="background: aliceblue;">
                <tr>

               @php $i=0; @endphp
                 @foreach($columns as $c)
                 <input type="text"  name="col_value{{$i+1}}" value="{{$c->cols}}" hidden />

                <th id="{{$i}}" class="">
                  <input style="background: aliceblue"; class="text-center w-100" type="text" name="{{$c->cols}}"value="{{$c->cols}}"/> 
                </th>

                  @php $i++ @endphp @endforeach 

                  
                 
                 <th  id="{{$i}}"class="text-center">Action</th>

                <button type="submit"  class=" ml-4 btn py-0  btn-sm btn-outline-success delete_member" data-id="">Update Colums</button> 

                  <th  id="{{$i+1}}" class="text-center"></th> 

                 

                 

                </tr>
              </thead>
               </form>

              
              <tbody>

                <!-- Search -->
                 @if(isset($result)) 
        @if($result->count()==0) <p class="text-center bg-warning "> No results found! </p> @endif
                  @if($result->count()>0) 
                  @foreach($products as $p)
                  @foreach($result as $r) @if($r->Id==$p->Id)

                 <form method="POST" enctype="multipart/form-data" action="{{route('update_pro')}}">@csrf 
                <tr>
  
                 @foreach($colLists as $key => $value)
                 @if($value!='updated_at' && $value!='col_id')
           
               
                  <td class="test">
      
               
                    @if($value=='Price')
                    <input autocomplete="off"   class="w-100 test d-inline" type="text" name="{{$value}}" value="{{$p->$value}}" />@endif

                    @if($value=='Url')
                    <input style="text-decoration: underline;color: green; "autocomplete="off"   class="w-100 test d-inline"  name="Url" type="text"
                    value="{{$p->$value}}" />
                    
                   {{--  <a style="font-size: 12px;" data-toggle="modal" data-target="#currency{{$p->Id}}"  class="btn px-1 py-0 float-right mt-auto  btn-small btn-outline-success delete_member" data-id="">edit</a> --}} @endif

                     @if($value=='Image')
                     @if($p->$value=='')
                     <input  autocomplete="off" class="w-100 test " style="font-size: 8px; " type="file" name="image">
                     @else
                    <img  class="test w-100"class="mb-2" width="150px" height="150px" src="img/{{$p->$value}}">
                     <input style="font-size: 8px; " type="file" name="image">
                     @endif 
                      @endif

                    @if($value=='Id') <input type="number" hidden name="Id" value="{{$p->$value}}">
                    <input type="text" class="text-center w-100 test" name="col_id" value="{{$p->col_id}}">
                     @endif

                      @if($value=='Supplier') 
                      <select name="Supplier" >
                      <option hidden value="">Select a Suppler</option>
                      @foreach($supplier as $s)  
                  <option @if($p->Supplier==$s->name) selected @endif value="{{$s->name}}">{{$s->name}}</option> @endforeach   
                      </select> 
                    
                     @endif


                      @if($value!='Supplier' && $value!='Price' && $value!='Url' && $value!='Image' && $value!='Id')
                      <input autocomplete="off" class="w-100 test" type="text" name="{{$value}}" value="{{$p->$value}}" /> @endif
                     
                  </td>
                  @endif
                  @endforeach

                  <td class="text-center">
                   
                    <a onclick="confirm('are you sure?');"href="{{route('delpro',$p->Id)}} " class="py-0 btn btn-sm btn-outline-danger delete_member" type="button" data-id="">Delete</a>
                      <button type="submit"  class="btn py-0  btn-sm btn-outline-success delete_member" data-id="">Update</button>
                  </td>
               

                </tr>
                 </form>
                

              </tbody>




{{-- Modal --}}

  
  <div  class="modal fade" id="currency{{$p->Id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">
        
  <form method="POST" action="{{route('update_pro')}}">
                        @csrf

<div class="form-group ">

  <label class="d-inline small text-dark mb-1 ml-1" for="inputEmailAddress">Url</label>
                                            
                   <input type="number" hidden name="Id" value="{{$p->Id}}">
                                            <input class=" d-inline w-50 form-control ml-5 px-2 my-2" type="name" name="Url" id="inputEmailAddress" 
                                           autocomplete="email" autofocus value="{{$p->Url}}"  /></div>   

    

                  
                                            <div class="form-group d-flex align-items-center justify-content-between mt-5 mb-0">
                                            
                                            
                                            <input style="margin-left: 100px;background: aliceblue;border-radius: 20px; " type="submit"class=" w-25 btn btn-info text-dark d-block font-weight-bold " href="" name="add" value="Update" /></div>
                    </form> 

    
      </div>
    
    
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
  {{-- Modal --}}





@endif  @endforeach
              @endforeach



                  @endif 
                <!-- End Search -->
               
                  @else
                   <!-- End Search -->

                   @php $i=0; @endphp
                  @foreach($products as $p)  @php $i++; @endphp
                 <form method="POST" enctype="multipart/form-data" action="{{route('update_pro')}}">@csrf 
                <tr>
                
                 @foreach($colLists as $key => $value)
                 @if($value!='updated_at' && $value!='col_id')
           
               
                  <td class="test">
      
               
                    @if($value=='Price')
                    <input autocomplete="off"   class="w-100 test d-inline" type="text" name="{{$value}}" value="{{$p->$value}}" />@endif

                    @if($value=='Url')
                    <input style="text-decoration: underline;color: green; "autocomplete="off"   class="w-100 test d-inline"  name="Url" type="text"
                    value="{{$p->$value}}" />
                    
                   {{--  <a style="font-size: 12px;" data-toggle="modal" data-target="#currency{{$p->Id}}"  class="btn px-1 py-0 float-right mt-auto  btn-small btn-outline-success delete_member" data-id="">edit</a> --}} @endif

                     @if($value=='Image')
                     @if($p->$value=='')
                     <input  autocomplete="off" class="w-100 test " style="font-size: 8px; " type="file" name="image">
                     @else
              <a href="img/{{$p->$value}}"> <img  class="test w-100"class="mb-2" width="150px" height="150px" src="img/{{$p->$value}}"> </a>
                     <input style="font-size: 8px; " type="file" name="image">
                     @endif 
                      @endif

                    @if($value=='Id') <input type="number" hidden name="Id" value="{{$p->$value}}">
                    <input autocomplete="off" type="text" class="text-center w-100 test" name="col_id" value="{{$p->col_id}}">
                     @endif

                      @if($value=='Supplier') 
                      <select name="Supplier" >
                      <option hidden value="">Select a Suppler</option>
                      @foreach($supplier as $s)  
                  <option @if($p->Supplier==$s->name) selected @endif value="{{$s->name}}">{{$s->name}}</option> @endforeach   
                      </select> 
                    
                     @endif


                      @if($value!='Supplier' && $value!='Price' && $value!='Url' && $value!='Image' && $value!='Id')
                      <input autocomplete="off" class="w-100 test" type="text" name="{{$value}}" value="{{$p->$value}}" /> @endif
                     
                  </td>
                  @endif
                  @endforeach

                  <td class="text-center">
                   
                    <a onclick="confirm('are you sure?');"href="{{route('delpro',$p->Id)}} " class="py-0 btn btn-sm btn-outline-danger delete_member" type="button" data-id="">Delete</a>
                      <button type="submit"  class="btn py-0  btn-sm btn-outline-success delete_member" data-id="">Update</button> 
                  </td>
               

                </tr>
                 </form>
                

              </tbody>




{{-- Modal --}}

  
  <div  class="modal fade" id="currency{{$p->Id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">
        
  <form method="POST" action="{{route('update_pro')}}">
                        @csrf

<div class="form-group ">

  <label class="d-inline small text-dark mb-1 ml-1" for="inputEmailAddress">Url</label>
                                            
                   <input type="number" hidden name="Id" value="{{$p->Id}}">
                                            <input class=" d-inline w-50 form-control ml-5 px-2 my-2" type="name" name="Url" id="inputEmailAddress" 
                                           autocomplete="email" autofocus value="{{$p->Url}}"  /></div>   

    

                  
                                            <div class="form-group d-flex align-items-center justify-content-between mt-5 mb-0">
                                            
                                            
                                            <input style="margin-left: 100px;background: aliceblue;border-radius: 20px; " type="submit"class=" w-25 btn btn-info text-dark d-block font-weight-bold " href="" name="add" value="Update" /></div>
                    </form> 

    
      </div>
    
    
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
  {{-- Modal --}}






              @endforeach

              @endif
            </table>
          </div>
        </div>
      </div>
      <!-- Table Panel -->
    </div>
  </div>  

</div>



<style>
  
  td{
    vertical-align: middle !important;
  }
  td p{
    margin: unset
  }
  img{
    max-width:100px;
    max-height: :150px;
  }
</style>








<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>



{{-- Modal Supplier --}}
  <div  style="" class="modal fade" id="columns" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">     
 
  <form method="POST" action="{{route('supplier')}}">    @csrf
<div class="form-group ">
  <label class="d-inline small text-dark mb-1 ml-1" for="inputEmailAddress">Name:</label>
      <input type="number" hidden name="Id" value="">
                                            <input class=" d-inline w-50 form-control ml-5 px-2 my-2" type="name" name="cols" id="" 
                                           autocomplete="email" autofocus value=""  /></div>    
                                            <div class="form-group d-flex align-items-center justify-content-between mt-5 mb-0">    <input style="margin-left: 100px;background: aliceblue;border-radius: 20px; " type="submit"class=" w-25 btn btn-info text-dark d-block font-weight-bold " href="" name="add" value="Add" /></div>
                                             </form>
      </div>
        <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>
  {{-- Modal --}}



<script type="text/javascript">



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
      document.getElementById("rmenu").className = "show w-25 menuShow";
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



@endsection