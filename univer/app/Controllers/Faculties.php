<?php namespace App\Controllers;

use App\Models\FacultiesModel;
use App\Models\DepartmentsModel;

class Faculties extends BaseController
{
	public function create()
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            if($this->request->getMethod() === 'get'){
                return view('faculties/create',['title' => 'Добавление факультета']);
            } 
            elseif($this->request->getMethod() === 'post'){
                
                // validation files
                $file1_validate = $this->validate([
                    'logo' => [
                        'uploaded[logo]',
                        'mime_in[logo,image/jpg,image/jpeg,image/png,image/gif]',
                        'max_size[logo,3024]' //-1mb
                    ]
                ]);
                $file2_validate = $this->validate([
                    'image' => [
                        'uploaded[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/png,image/gif]',
                        'max_size[image,3024]' //-1mb
                    ]
                ]);
                // result validation
                if(!$file1_validate) {
                    return view('faculties/create_res', [
                        'title' => 'Ошибка загрузки файла',
                        'mess' => '<span style="color: red"> Ошибка загрузки логотипа </span>'
                    ]);
                } elseif (!$file2_validate) {
                    return view('faculties/create_res', [
                        'title' => 'Ошибка загрузки файла',
                        'mess' => '<span style="color: red"> Ошибка загрузки изображения </span>'
                    ]);
                } else {
                    //insert data
                    $path = './uploads/files';
                    $img1 = $this->request->getFile('logo');
                    $img2 = $this->request->getFile('image');

                    if(!$img1->hasMoved()) {
                        $img1->move($path);
                    }

                    if(!$img2->hasMoved()) {
                        $img2->move($path);
                    }

                    $facultiesModel = new FacultiesModel();
                    $data = [
                        'name' => $this->request->getPost('name'),
                        'alias' => $this->request->getPost('alias'),
                        'logo' => 'public/uploads/files/'.$img1->getName(),
                        'image' => 'public/uploads/files/'.$img2->getName(),
                        'about' => $this->request->getPost('about'),
                        'status' => $this->request->getPost('status')
                    ];
                    $facultiesModel ->insert($data);
                    return view('faculties/create_res',[
                        'title' => 'Отчет о добавлении факультета',
                        'mess' => '<span style="color: green">Факультет успешно добавлен </span>'
                    ]);
                }
            }
        }





		$faculties = $facultiesModel->findAll();
		return view('home/index',[
				'title' => 'Главная',
				'faculties' => $faculties
			]);
	}

	public function details($fid)
	{
        $facultiesModel = new FacultiesModel();
        $faculty = $facultiesModel->find($fid);
        $departmentsModel = new DepartmentsModel();
        $departments = $departmentsModel->where('faculty_id',$fid)
                                        ->findAll();
		return view('faculties/details',[
            'title' => 'Информация о факультете - '.$fid,
            'faculty' => $faculty,
            'departments' => $departments
        ]);
	}

	public function delete($fid)
	{
		return view('home/contacts',['title' => 'Контакты']);
    }
    
    public function update($fid)
	{
		return view('home/contacts',['title' => 'Контакты']);
    }

	//--------------------------------------------------------------------

}
