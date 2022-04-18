<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class subscriberController extends Controller
{
    public function store(Request $req){

       
       $this->validate($req, [
            'email'=> 'required|email|unique:subscribers',
            ]);
        
            $subscriber= new Subscriber;
            $subscriber->email= $req->email;
            $subscriber->save();

            return redirect()->back()->with('success', 'Successfully subscribed');
    

       
    }
}
