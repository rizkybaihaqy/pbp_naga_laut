<?php namespace App\Controllers;

use App\Models\AdminModel;

class Penulis extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->penulis = new AdminModel();
        helper(['form','url','session']);
    }

    public function index($id)
	{
		$data = [
            'post' => $this->penulis->getAllPost($id),
            'penulis' => $this->penulis->getPenulis($id),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => 'My Posts'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'penulis/view_post', 'data' => $data]);
        }else {
            return view('templates/main',['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
	}

    public function profile($id)
	{
		$data = [
            'penulis' => $this->penulis->getPenulis($id),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => 'Profile'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'penulis/profile', 'data' => $data]);
        }else {
            return view('templates/main',['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
        
    }
    
    public function editprofile($id)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'kota' => $this->request->getPost('kota'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp')
        ];

        $validation_rules = [
            'nama' => 'required',
			'email' => 'required',
			'kota' => 'required',
			'alamat' => 'required',
			'no_telp' => 'required',
        ];

        if($this->validate($validation_rules)){
            $query = $this->penulis->editProfile($data, $id);
            if($query){
                session()->setFlashdata('success', 'Infos has been updated');
                return redirect()->to(base_url('penulis/profile/'.$id));
            }else{
                return redirect()->to(base_url('penulis/profile/'.$id));
            }
        }else{
            return redirect()->to(base_url('penulis/profile/'.$id));
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

        $query_old = $this->penulis->cekPassword($password, $id);
        if($query_old){
            if ($this->validate($validation_rules)){
                $query = $this->penulis->editPassword($data,$id);
                if($query){
                    session()->setFlashdata('success', 'Password has been updated');
                    return redirect()->to(base_url('penulis/profile/'.$id)); 
                }
            }else{
                session()->setFlashdata('warning', 'Password not match the validation');
                return redirect()->to(base_url('penulis/profile/'.$id)); 
            }
        }else{
            session()->setFlashdata('warning', 'Old Password is wrong');
            return redirect()->to(base_url('penulis/profile/'.$id)); 
        }
    }

    public function login()
    {
        $data = [
            // 'login' => $this->Penulis->loginPenulis(),
            'validation' => \Config\Services::validation(),
            'session' => \Config\Services::session(),
            'title' => 'View'
        ];
        return view('templates/main',['page' => 'penulis/loginPenulis', 'data' => $data]);  
    }

    public function signup()
    {
        $data = [
            // 'signup' => $this->signup->signup(),
            'validation' => \Config\Services::validation(),
            'session' => \Config\Services::session(),
            'title' => 'View'
        ];
        return view('templates/main',['page' => 'penulis/signup', 'data' => $data]);  
    }

    public function masuk()
    {
        
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));

        $id = $this->penulis->getPenulisByEmail($email);

        $session = \Config\Services::session();

        $validation_rules = [
            'email' => [
                'rules' => 'required',
                'label' => 'email'
            ],

            'password' => [
                'rules' => 'required|min_length[3]',
                'label' => 'password'
            ],
        ];

        if ($this->validate($validation_rules)){
            $query = $this->penulis->loginPenulis($email,$password);
            if($query){
                session()->setFlashdata('success', 'login successfully');
                $session->set('username','penulis');
                $session->set('id',$id->idpenulis);
                return redirect()->to(base_url('penulis/index/'.$id->idpenulis)); 
            }else{
                return redirect()->to(base_url('penulis/login'))->withInput(); 
            }
        }else{
            return redirect()->to(base_url('penulis/login'))->withInput(); 
        }
    }

    public function save(){
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'kota' => $this->request->getPost('kota'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
            'no_telp' => $this->request->getPost('no_telp'),
        ];
        // $this->signup->signup($data);

        $validation_rules = [
            'nama' => [
                'rules' => 'required|alpha_space|max_length[30]',
                'label' => 'Nama'
            ],
            
            'alamat' => [
                'rules' => 'required|alpha_space|max_length[100]',
                'label' => 'alamat'
            ],
            
            'kota' => [
                'rules' => 'required|alpha_space|max_length[20]',
                'label' => 'kota'
            ],
            
            'email' => [
                'rules' => 'required|valid_email',
                'label' => 'email'
            ],
            
            'password' => [
                'rules' => 'required|min_length[3]',
                'label' => 'password'
            ],
    
            'no_telp' => [
                'rules' => 'required|integer|max_length[12]',
                'label' => 'no_telp'
            ],
            
        ];
            
        if ($this->validate($validation_rules)){
            $query = $this->penulis->signup($data);
            if($query){
                return redirect()->to(base_url('penulis/login/')); 
            }else{
                return redirect()->to(base_url('penulis/signup'))->withInput(); 
            }
        }else{
            return redirect()->to(base_url('penulis/signup'))->withInput(); 
        }
    }
}
?>