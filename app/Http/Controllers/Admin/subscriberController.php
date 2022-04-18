<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subscriberController extends Controller
{
    public function index(){
        $subscribers= Subscriber::latest()->get();
        return view('admin.subscriber', ['subscribers'=> $subscribers]);
    }
    public function destroy($id){
        $subscriber= Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber successfully deleted');
    }
}
