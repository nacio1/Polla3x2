<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('main');
	}
	public function reglamento()
	{
		return view('reglamento');
	}
	public function terminos()
	{
		return view('terminos');
	}
	//--------------------------------------------------------------------

}
