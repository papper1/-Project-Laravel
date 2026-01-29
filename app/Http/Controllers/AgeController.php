<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function index()
    {
        return view('age');
    }

    public function saveAge(Request $request)
    {
        $age = $request->age;

        session(['age' => $age]);

        return redirect('/restricted');
    }
    
    public function restricted()
    {
        return "Bạn đủ tuổi, được phép truy cập!";
    }
}
