<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {    	
    	$data['test']= "test";
    	return view('dashboard',$data);
    }
}
