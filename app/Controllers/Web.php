<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class Web extends Controller
{
    public function __construct()
    {
        $this->post = new BlogModel();
        helper(['form', 'url']);
        $this->category = new AdminModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');

        $data = [
            'post' => $this->post->search($keyword),
            'title' => 'Punk From The West',
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'category' => $this->category->getCategory(),
        ];
        return view('templates/main', ['page' => 'web/index', 'data' => $data]);
    }

    public function view($page = 'index')
    {
        if (!is_file(APPPATH . '/Views/web/' . $page . '.php')) {
            //Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        //$data['title'] = ucfirst($page); // Capitalize the firts letter

        //d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');

        $data = [
            'post' => $this->post->search($keyword),
            'title' => 'Punk From The West',
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'category' => $this->category->getCategory(),
        ];

        return view('templates/main', ['page' => 'web/' . $page, 'data' => $data]);
    }

    public function category($category)
    {
        $cat = $this->category->getCategory($category);
        //echo  dd($cat);
        $data = [
            'post' => $this->post->getPostByCategory($category),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title' => $cat->nama,
        ];
        return view('templates/main', ['page' => 'web/category', 'data' => $data]);
    }
}
