<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\HomeResource;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    public function index()
    {
        $data = ['id' => 5 , 'name'=>'mohamedramadan' , 'saed'=>'elzero'];
        if(Gate::allows('admin-access'))
        {
             $j =  HomeResource::make((object)$data);
             return $j ;
        }
        else{
            abort(403);
        }
       

    }
}
