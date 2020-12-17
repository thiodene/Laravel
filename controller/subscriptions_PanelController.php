<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Subscriber;
use App\Distribution;
use App\Tag;

class PanelController extends Controller
{
    public function show(){
        
        return view('admin.panel.panel');


    }

}
