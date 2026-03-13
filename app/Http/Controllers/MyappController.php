<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyappController extends Controller
{
    //
    public function sample(){
        $user = [
            'name' => "Arjun",
            'place' => "Kochi",
            'age' => 22
        ];
        // dd($user);
        return view("myapp.index", compact("user")
        );
    }

    public function about(){
        return view("myapp.about");
    }

    public function contact(){
        return view("myapp.contact");
    }

    public function product($id){
        return view("myapp.product",compact('id'));
    }

    
}
