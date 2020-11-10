<?php namespace App\Controllers;

use App\Models\FacultiesModel;

class Home extends BaseController
{
	public function index()
	{
		$facultiesModel = new FacultiesModel();
		$faculties = $facultiesModel->findAll();
		return view('home/index',[
				'title' => 'Главная',
				'faculties' => $faculties
			]);
	}

	public function about()
	{
		return view('home/about',['title' => 'Про сайт']);
	}

	public function contacts()
	{
		return view('home/contacts',['title' => 'Контакты']);
	}

	//--------------------------------------------------------------------

}
