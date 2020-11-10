<?php namespace App\Controllers;

use App\Models\GroupsModel;

class Groups extends BaseController
{
	public function create($did)
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            if($this->request->getMethod() === 'get'){
                return view('groups/create',[
                    'title' => 'Добавление группы',
                    'did' => $did
                    ]);
            } 
        
            elseif($this->request->getMethod() === 'post'){
                $groupsModel = new GroupsModel();
                $data = [
                    'name' => $this->request->getPost('name'),
                    'students' => $this->request->getPost('students'),
                    'headman' => $this->request->getPost('headman'),
                    'faculty_id' => $did,
                    'status' => $this->request->getPost('status')
                ];
                $groupsModel ->insert($data);
                return redirect()->to(site_url('/departments/details/'.$did));
            }
        }
        }

	public function details($did)
	{
        $groupsModel = new GroupsModel();
        $department = $groupsModel->find($did);

		return view('groups/details',[
            'title' => 'Информация о группе - '.$did,
            'department' => $department

        ]);
	}

	public function delete($did)
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            $groupsModel = new GroupsModel();
            $groupsModel->delete($did);
        return view('/groups/delete',[
            'title' => 'Удаление группы - '.$did,
            'mess' => '<span style="color: green"> Группа успешно удалена</span>'
        ]);
        }
    }
    
    public function update($did)
	{
        if(session('user') !== 'admin123'){
            return view('auth/deny403', ['title' => 'Page 403']);
        } else {
            return view('/groups/update',[
                'title' => 'Редактирование группы - '.$did,
                
            ]);
        }
    }
}