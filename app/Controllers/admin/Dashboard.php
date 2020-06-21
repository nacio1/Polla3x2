<?php namespace App\Controllers\admin;

use  App\Controllers\Basecontroller;

class Dashboard extends BaseController
{
	public function index()
	{
		$data['title'] = 'Dashboard'; 
		return view('admin/dashboard', $data);
	}   

	//--------------------------------------------------------------------

}