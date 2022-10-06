<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\plans;
use App\Models\Products;
use App\Models\trainers;
use App\Models\users;
use Illuminate\Support\Facades\Schema;



class adminController extends Controller
{
    //


    public function login(){

        return view('login');
    }

      public function logout() {
      Session::forget('user_id');
    return view('login');
}

     public function home(){

        $products = DB::table('products')->get();
        $columns = DB::table('columns')->get();
        $colLists = DB::getSchemaBuilder()->getColumnListing('products');
        $supplier = DB::table('supplier')->get();

        return view('pages.products', compact('supplier', 'products', 'columns', 'colLists') );
    }


 public function add_product(){ 
   $datas=array();
   $datas['Name']='';
  
   DB::table('products')->insert($datas);
     return redirect('/');

   
     
   

    }


  public function search(Request $data){

        $products = DB::table('products')->get();
        $columns = DB::table('columns')->get();
        $colLists = DB::getSchemaBuilder()->getColumnListing('products');
        $supplier = DB::table('supplier')->get();
        
      $searchName=$data->searchName;      
      $result=DB::table('products')->where('Name', 'like', '%'.$searchName.'%')//->get();
      ->orWhere('Supplier', 'like', '%'.$searchName.'%')->get();
       //print_r($result->count());
      return view('pages.products', compact('supplier', 'products', 'columns', 'colLists', 'result') );
    }


     public function column(){
      $cols='New_'.rand(10,10000);     
      $datas=array();
      $datas['cols']=$cols; 
      DB::table('columns')->insert($datas);
      DB::statement('ALTER TABLE products ADD '.$cols.' varchar(255)');
      return redirect('/');
    }


     public function supplier(Request $r){
      $cols=$r->cols;     
      $datas=array();
      $datas['name']=$cols; 
      DB::table('supplier')->insert($datas);
      return redirect('/');
    }


    public function col_up(Request $r){
      $rows=DB::table('columns')->get(); $rows=$rows->count();
      $data=$r->all();
     // print_r( $data);  
      //echo $rows ; exit;

      for($i=1;$i<=$rows;$i++) {
        $cols=$data['col_value'.$i];  //exit; 
        $new_col = $r->$cols; //echo $new_col.$rows; } exit;
          DB::table('columns')->where('cols',$cols)->update(['cols'=> $new_col]);
          //DB::statement('ALTER TABLE products RENAME COLUMN '.$cols. 'TO'. $new_col);
        }

      return redirect('/');
    }


     public function edit_products(Request $data){
    $id=$data->Id;
    
     //SINGLE IMG
    if($data->image!=''){
          $image=$data->file('image');
          $uniqid=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $create_name=$uniqid.'.'.$ext; 
          $loc='img';
          $image->move($loc, $create_name);
          $datas['Image']=$create_name;
           Products::where('Id',$id)->update($data->except(['_token']));
          DB::table('products')->where('Id',$id)->update($datas);
}
else
    Products::where('Id',$id)->update($data->except(['_token']));
     return redirect('/');

    }


  public function delpro($id){

          $del = DB::table('products')->where('Id',$id)->delete();

         return redirect()->back();
    }



//-----------------------------------------------------------------------




public function adminLogin(Request $formData){
$email = $formData->email;
$password = $formData->password;

$user= DB::table('users')->where('email', $email)->get(); 
$check_user=json_decode($user);

//print_r($check_user); echo $check_user[0]->password; exit;

if($user->count() >0 ) {
$db_password=$check_user[0]->password;

if($password==$db_password) { Session::put('user_id', $email); return redirect('home');  }
else echo "Password wrong!";


}
    else { echo "user don't exist"; }

        
    }



   
     public function users(){

         $users = users::get();

        return view('pages.users', compact('users') );
    }




}
