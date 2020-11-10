<?php namespace App\Controllers;


use App\Models\UsersModel;

class Auth extends BaseController
{
	public function signin()
	{
        if($this->request->getMethod() === 'get'){
		    return view('auth/signin',['title' => 'Вход']);
        } 
        elseif($this->request->getMethod() === 'post'){
            $model = new UsersModel();
            $login = $this->request->getPost('login');
            $passw = md5($this->request->getPost('password'));
            $result = $model->where('login', $login)
                            ->where('password',$passw)
                            ->findAll();
            if(count($result) == 0){
                $mess = '<span style="color: red">Пользователь не найден </span>';
            } else {
                $mess = '<span style="color: green">Вход выполнен </span>';
                $this->session->set(['user' => $login]);
            }
            return view('auth/signin_res',[
                'title' => 'Отчет об авторизации',
                'mess' => $mess
            ]);
        }
		
	}

	public function signup()
	{
        if($this->request->getMethod() === 'get'){
		    return view('auth/signup',['title' => 'Регистрация']);
        } 
        elseif($this->request->getMethod() === 'post'){
            $model = new UsersModel();
            $data = [
                'login' => $this->request->getPost('login'),
                'password' => md5($this->request->getPost('password1')),
                'email' => $this->request->getPost('email'),
                'regdate' => date('Y-m-d H:i:s'),
                'status' => 'simple_user'
            ];
            $model->insert($data);
            return view('auth/signup_res',[
                'title' => 'Отчет о регистрации',
                'mess' => '<span style="color: green">Регистрация успешно завершена </span>'
            ]);
        }
    }

	public function signout()
	{
        $this->session->destroy();
		return redirect()->to(site_url('/index'));
    }
    public function profile()
	{
		return view('auth/profile',['title' => 'Профиль']);
	}

	//--------------------------------------------------------------------

}
