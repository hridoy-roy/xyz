<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class RegController extends Controller
{
    public function home(){
        return view('home');
    }

    public function customer(){
        return view('form');
    }
    public function reg(Request $req){
    //    echo "<pre>";
    //    print_r($req->all());


        // insert Query
       $customer = new Customers;
       $customer->customer_name = $req['customer_name'];
       $customer->email = $req['email'];
       $customer->password = md5($req['password']);
       $customer->gender = $req['gender'];
       $customer->address = $req['address'];
       $customer->city = $req['city'];
    // $customer->DOB = $req['DOB'];
    // $customer->status = $req['status'];
       $customer->points = $req['points'];
       $customer->country = $req['country'];
       $customer->state = $req['state'];
       $customer->save();

       return redirect('/customer/view');
       //-----------
    }


    public function view(){
        $customerView = Customers::all();

        // echo "<pre>";
        // print_r($customerView->toArray());
        // echo "</pre>";
        // die;

        $data = compact('customerView');
        return view('customer_view')->with($data);
    }
}
