<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->post = new AdminModel();
        helper(['form', 'url']);
    }

    public function index($id)
    {
        $data = [
            'post'      => $this->post->getAllPost($id),
            'penulis'   => $this->post->getPenulis($id),
            'session' => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title'     => 'View'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)) {
            return view('templates/main', ['page' => 'penulis/view_post', 'data' => $data]);
        } else {
            return view('templates/main', ['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
    }

    public function edit($idpost)
    {
        $data = [
            'row'           => $this->post->getPost($idpost),
            'kategori'      => $this->post->getCategory(),
            'validation'    => \Config\Services::validation(),
            'session' => \Config\Services::session(),
            'title'         => 'Edit'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)) {
            return view('templates/main', ['page' => 'penulis/edit_post', 'data' => $data]);
        } else {
            return view('templates/main', ['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
    }

    public function add($idpenulis)
    {
        $data = [
            'penulis'       => $this->post->getPenulis($idpenulis),
            'kategori'      => $this->post->getCategory(),
            'validation'    => \Config\Services::validation(),
            'session'       => \Config\Services::session(),
            'title'         => 'Add'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)) {
            return view('templates/main', ['page' => 'penulis/add_post', 'data' => $data]);
        } else {
            return view('templates/main', ['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
    }

    // public function ubahTanggal($tanggal){
    //     $pisah = explode("/",$tanggal,3);
    //     $satu = array($pisah[2],$pisah[0],$pisah[1]);
    //     $satukan = implode("-",$satu);
    //     return $satukan;
    // }
    public function save($idpenulis)
    {
        $data = [
            'judul'            => $this->request->getPost('judul'),
            'idkategori'    => $this->request->getPost('kategori'),
            'isi_post'      => $this->request->getPost('isi'),
            'gambar'        => $this->request->getPost('gambar'),
            'idpenulis'     => $idpenulis
        ];

        $validation_rules = [
            'judul' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'label' => 'Name'
            ],
            'kategori'      => 'required',
            'isi'           => 'required'
        ];

        if ($this->validate($validation_rules)) {
            $query = $this->post->addPost($data);
            if ($query) {
                session()->setFlashdata('success', 'Post data has been updated');
                return redirect()->to(base_url('artikel/index') . '/' . $idpenulis);
            }
        } else {
            return redirect()->to(base_url('artikel/add') . '/' . $idpenulis)->withInput();
        }
    }

    public function update($idpost)
    {
        $data = [
            'judul'            => $this->request->getPost('judul'),
            'idkategori'    => $this->request->getPost('kategori'),
            'isi_post'      => $this->request->getPost('isi'),
            'gambar'        => $this->request->getPost('gambar'),
        ];

        $idpenulis = $this->request->getPost('disabledIdPenulis');

        $validation_rules = [
            'judul' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'label' => 'Name'
            ],
            'kategori'      => 'required',
            'isi'           => 'required',
        ];

        if ($this->validate($validation_rules)) {
            $query = $this->post->editPost($data, $idpost);
            if ($query) {
                session()->setFlashdata('success', 'Post data has been updated');
                return redirect()->to(base_url('artikel/index') . '/' . $idpenulis);
            }
        } else {
            return redirect()->to(base_url('artikel/edit') . '/' . $idpost)->withInput();
        }
    }

    public function delete($idpost)
    {
        $data = [
            'row'       => $this->post->getPost($idpost),
            'session'   => \Config\Services::session(),
            'validation' => \Config\Services::validation(),
            'title'     => 'Delete'
        ];
        $session = \Config\Services::session();
        if (isset($session->username)) {
            return view('templates/main', ['page' => 'penulis/delete_post', 'data' => $data]);
        } else {
            return view('templates/main', ['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
    }

    public function del($idpost)
    {
        $penulis = $this->post->getPost($idpost);
        $query = $this->post->delPost($idpost);
        if ($query) {
            session()->setFlashdata('success', 'Post data has been deleted');
            return redirect()->to(base_url('artikel/index/' . $penulis->idpenulis));
        }
    }
}
