<?php namespace App\Controllers;

use App\Models\AdminModel;

class Category extends BaseController
{
    public function __construct() 
	{
        $this->category = new AdminModel();
		helper(['form','url']);
    }

    public function index()
    {
        $data = [
            'category'  => $this->category->getCategory(),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title'     => 'View'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/category/view_category', 'data' => $data]);    
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function edit($id)
    {
        $data = [
            'row'           => $this->category->getCategory($id),
            'validation'    => \Config\Services::validation(),
            'session'       => \Config\Services::session(),
            'title'         => 'Edit'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/category/edit_category','data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function add()
    {
        $data = [
            'validation'    => \Config\Services::validation(),
            'session' => \Config\Services::session(),
            'title'         => 'Add'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/category/add_category','data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function save($id=FALSE)
	{
        $data = [
            'nama' => $this->request->getPost('nama'),
        ];
		
		$validation_rules = [
			'nama' => [
				'rules' => 'required|alpha_space|max_length[30]',
				'label' => 'Nama'
			]
		];
		
		if($id === FALSE){ //add
			if ($this->validate($validation_rules)){
				$query = $this->category->addCategory($data);
				if($query){
					session()->setFlashdata('success', 'Category data added successfully');
					return redirect()->to(base_url('category')); 
				}
			}else{
				return redirect()->to(base_url('category/add'))->withInput(); 
			}
		}else{ //update
			if ($this->validate($validation_rules)){
				$query = $this->category->editCategory($data,$id);
				if($query){
					session()->setFlashdata('success', 'Category data has been updated');
					return redirect()->to(base_url('category')); 
				}
			}else{
					return redirect()->to(base_url('category/edit').'/'.$id)->withInput(); 
			}
		}
    }
    
    public function delete($id){
        $data = [
            'row'   => $this->category->getCategory($id),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => 'Delete'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)){
            return view('templates/main',['page' => 'admin/category/delete_category','data' => $data]);
        }else {
            return view('templates/main',['page' => 'admin/loginAdmin', 'data' => $data]);
        }
    }

    public function del($id){
        $query = $this->category->delCategory($id);
        if ($query) {
            session()->setFlashdata('success', 'Category data has been deleted');
            return redirect()->to(base_url('category'));
        }
    }
    // public function view($page = 'index')
    // {
    //     if ( ! is_file(APPPATH.'/Views/admin/category'.$page.'.php'))
    //     {
    //         //Whoops, we don't have a page for that!
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
    //     }

    // $data['title'] = ucfirst($page); // Capitalize the firts letter

    // return view('templates/main',['page' => 'admin/category'.$page, 'data' => $data]);
    // }
}
?>