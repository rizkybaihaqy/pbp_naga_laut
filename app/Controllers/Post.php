<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\KomentarModel;
use CodeIgniter\Controller;

class Post extends Controller
{
    public function __construct()
    {
        $this->post = new BlogModel();
        $this->komentar = new KomentarModel();
        helper(['form', 'url']);
    }

    public function index($id)
    {
        $judul = $this->post->getPost($id);
        //echo dd($judul);
        $data = [
            'post' => $this->post->getPost($id),
            'title' => $judul->judul,
            'session' => \Config\Services::session(),
            'komentar' => $this->komentar->getKomentar($id)
        ];
        return view('templates/main', ['page' => 'web/post', 'data' => $data]);
    }

    public function saveKomentar($id)
    {
        // dd($id);
        $session = \Config\Services::session();

        $data = [
            'idpost' => $id,
            'idpenulis' => $session->id,
            'isi' => $this->request->getPost('comment'),
        ];

        $validation_rules = [
            'comment' => [
                'rules' => 'required',
                'label' => 'isi'
            ]
        ];

        if ($this->validate($validation_rules)) {
            $query = $this->komentar->addKomentar($data);
            if ($query) {
                session()->setFlashdata('comment-success', 'Komment berhasil ditambahakan');
                return redirect()->to(base_url('post/index/' . $id));
            }
        } else {
            return redirect()->to(base_url('post/index/' . $id));
        }

        // $this->komentar->addKomentar($data);
        // return redirect()->to(base_url('post/' . $id));
    }

    public function delKomentar($idKomentar, $idPost)
    {
        //dd($idPost);
        $query = $this->komentar->delKomentar($idKomentar);
        if ($query) {
            session()->setFlashdata('comment-success-dihapus', 'Komment berhasil dihapus');
            return redirect()->to(base_url('post/index/' . $idPost));
        }
    }
}
