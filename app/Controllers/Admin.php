<?php namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function __construct() 
	{
        $this->admin = new AdminModel();
		helper(['form','url']);
    }

    public function index()
	{
		$data = [
            'sumpost' => $this->admin->getSumPost(),
            'category' => $this->admin->getCategory(),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => 'Dashboard'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/account/index', 'data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
	}

    public function viewPenulis()
    {
        $data = [
            'penulis'   => $this->admin->getPenulis(),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title'     => 'View'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/penulis/view_penulis', 'data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function reset($id){
        $data = [
            'row'   => $this->admin->getPenulis($id),
            'validation' => \Config\Services::validation(),
            'title' => 'Reset'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/penulis/reset','data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function do_reset($id){
        $data = [
            'password' => '202cb962ac59075b964b07152d234b70'
        ];
        $query = $this->admin->reset($data, $id);
        if ($query) {
            session()->setFlashdata('success','Password has been reset');
			return redirect()->to(base_url('admin/viewPenulis')); 
        }
    }

	public function profile($id)
	{
		$data = [
            'admin' => $this->admin->getAdmin($id),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => 'Profile'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/account/profile', 'data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function editpwd($id)
    {
        $data = [
            'password' => md5($this->request->getPost('new_pwd')),
        ];
        
        $password = md5($this->request->getPost('old_pwd'));

		$validation_rules = [
			'new_pwd' => 'required',
        ];

        $query_old = $this->admin->cekPasswordAdmin($password, $id);
        if($query_old){
            if ($this->validate($validation_rules)){
                $query = $this->admin->editPasswordAdmin($data,$id);
                if($query){
                    session()->setFlashdata('success', 'Password has been updated');
                    return redirect()->to(base_url('admin/profile/'.$id)); 
                }
            }else{
                session()->setFlashdata('warning', 'Password not match the validation');
                return redirect()->to(base_url('admin/profile/'.$id)); 
            }
        }else{
            session()->setFlashdata('warning', 'Old Password is wrong');
            return redirect()->to(base_url('admin/profile/'.$id)); 
        }
    }

    public function login()
    {
        $data = [
            //'login' => $this->admin->loginAdmin(),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => 'View'
        ];
        return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);  
    }

    public function masuk()
    {
        
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));

        $id = $this->admin->getAdminByEmail($email);

        $session = \Config\Services::session();

        $validation_rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'label' => 'email'
            ],

            'password' => [
                'rules' => 'required|min_length[3]',
                'label' => 'password'
            ],
        ];

        if ($this->validate($validation_rules)){
            $query = $this->admin->loginAdmin($email,$password);
            if($query){
                session()->setFlashdata('success', 'login successfully');
                $session->set('username','admin');
                $session->set('id',$id->idadmin);
                return redirect()->to(base_url('admin/index')); 
            }else{
                return redirect()->to(base_url('admin/login'))->withInput(); 
            }
        }else{
                return redirect()->to(base_url('admin/login'))->withInput(); 
        }
    }
    
    // public function category()
    // {
    //     $data = [
    //         'category' => $this->admin->getCategory(),
    //         'title' => 'View'
    //     ];
    //     return view('templates/main',['page' => 'admin/account/index', 'data' => $data]);    
    // }
}
?>