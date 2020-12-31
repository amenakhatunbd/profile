<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;
use App\Protfolio;
use App\About;


class PageController extends Controller
{
    public function index(){
        $main = Main::first();
        $services =Service::all();
        $protfolios =Protfolio::all();
        $abouts =About::all();
        return view('pages.index', compact('main','services', 'protfolios','abouts'));        
    }
  
    public function dashboard(){
        return view('pages.dashboard');
    }
    
    public function team(){
        return view('pages.team');
    }
    public function contact(){
        return view('pages.contact');
    }
}
