<?php

class DashboardController extends BaseController {


	public function index()
	{
		
 			//<a href='http://localhost:8000/logout'>Salir</a>;
		return View::make('back.startpage'); 

	}

}