<?php namespace App\Controllers;

use App\Models\DepartmentsModel;

class Departments extends BaseController
{
	public function create($fid)
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            if($this->request->getMethod() === 'get'){
                return view('departments/create',[
                    'title' => 'Добавление кафедры',
                    'fid' => $fid
                    ]);
            } 
        
            elseif($this->request->getMethod() === 'post'){
                $departmentsModel = new DepartmentsModel();
                $data = [
                    'name' => $this->request->getPost('name'),
                    'employees' => $this->request->getPost('employees'),
                    'specialties' => $this->request->getPost('specialties'),
                    'faculty_id' => $fid,
                    'status' => $this->request->getPost('status')
                ];
                $departmentsModel ->insert($data);
                return redirect()->to(site_url('/faculties/details/'.$fid));
            }
        }
        }

	public function details($did)
	{
        $departmentsModel = new DepartmentsModel();
        $department = $departmentsModel->find($did);

		return view('departments/details',[
            'title' => 'Информация о кафедре - '.$did,
            'department' => $department

        ]);
	}

	public function delete($did)
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            $departmentsModel = new DepartmentsModel();
            $departmentsModel->delete($did);
        return view('/departments/delete',[
            'title' => 'Удаление кафедры - '.$did,
            'mess' => '<span style="color: green"> Кафедра успешно удалена</span>'
        ]);
        }
    }
    
    public function update($did)
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            return view('/departments/update',[
                'title' => 'Редактирование кафедры - '.$did,
                
            ]);
        }
    }
}