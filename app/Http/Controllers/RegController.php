<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use phpDocumentor\Reflection\Types\Void_;

class RegController extends Controller
{
    public function home(){
        return view('home');
    }

    public function customer(){
        $custo = new Customers();
        $url = url('/customer');
        $title = "Registration";
        $data = compact('url','title','custo');
        return view('form')->with($data);
    }


    public function reg(Request $req){
    //    echo "<pre>";
    //    print_r($req->all());

        // p($req->all());
        // die;

        // insert Query
       $customer = new Customers;
       $customer->name = $req['name'];
       $customer->email = $req['email'];
       $customer->password = md5($req['password']);
       $customer->gender = $req['gender'];
       $customer->address = $req['address'];
       $customer->city = $req['city'];
       $customer->dob = $req['dob'];
    // $customer->status = $req['status'];
       $customer->points = $req['points'];
       $customer->country = $req['country'];
       $customer->state = $req['state'];
       $customer->save();
       return redirect('/customer');
       //-----------
    }


    public function view(Request $request){

        // search
        $search = $request['search'] ?? "";
        if ($search != "") {
            // Where
            // $search
            // %$search
            // $search%
            // %$search%
            $customerView = Customers::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        }
        else{
            $customerView = Customers::paginate(15);
        }
        // End Search 
        
        // echo "<pre>";
        // print_r($customerView->toArray());
        // echo "</pre>";
        // die;
        $data = compact('customerView','search');
        return view('customer_view')->with($data);
    }

    public function trash(){
        
        $customerView = Customers::onlyTrashed()->get();
        $data = compact('customerView');
        // dd("ok");
        return view('customer_trash')->with($data);
    }


    public function delete($id){
    // echo $id;
       $cust = Customers::find($id);

       if (!is_null($cust)) {
        $cust->delete();
       }   
    //     echo '<pre>';
    //    print_r($cust);
    return redirect('customer');//->back()
    }

 

    public function restore($id){
           $cust = Customers::withTrashed()->find($id);
    
           if (!is_null($cust)) {
            $cust->restore();
        return redirect()->back();
        }
    }

    public function permanent($id){
        $cust = Customers::withTrashed()->find($id);
 
        if (!is_null($cust)) {
         $cust->forceDelete();
        return redirect()->back();
        }
    }

    public function edit($id){
        $custo = Customers::find($id);

        if (is_null( $custo)) {
            // not Found
            return  redirect('customer');
        } else {
         
            $url = url('/customer/update'). "/" .$id; 
            $title = "Update";
            $data = compact('custo','url','title');
            return view('form')->with($data); 
        }
        
    }
    public function update($id,Request $req){

      
       $customer = Customers::find($id);
       $customer->customer_name = $req['customer_name'];
       $customer->email = $req['email'];
       $customer->gender = $req['gender'];
       $customer->address = $req['address'];
       $customer->city = $req['city'];
    // $customer->DOB = $req['DOB'];
    // $customer->status = $req['status'];
       $customer->points = $req['points'];
       $customer->country = $req['country'];
       $customer->state = $req['state'];
       $customer->save();

       return redirect('customer');

    }
}
