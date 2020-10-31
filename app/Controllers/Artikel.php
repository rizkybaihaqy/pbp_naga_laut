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

    public function index()
    {
        $session = \Config\Services::session();

        $data = [
            'post'      => $this->post->getAllPost($session->id),
            'penulis'   => $this->post->getPenulis($session->id),
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
            if ($data['row']->idpenulis == $session->id) {
                return view('templates/main', ['page' => 'penulis/edit_post', 'data' => $data]);
            } else {
                return redirect()->to(base_url('artikel'));
            }
        } else {
            return view('templates/main', ['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
    }

    public function add()
    {
        $session = \Config\Services::session();
        $data = [
            'penulis'       => $this->post->getPenulis($session->id),
            'kategori'      => $this->post->getCategory(),
            'validation'    => \Config\Services::validation(),
            'session'       => \Config\Services::session(),
            'title'         => 'Add'
        ];

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
    public function save()
    {
        $session = \Config\Services::session();

        $validation_rules = [
            'judul' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'label' => 'Name'
            ],
            'kategori'      => 'required',
            'isi'           => 'required',
            'gambar'        => [
                'rules' => 'uploaded[gambar]|max_size[gambar,10486]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'pilih gambar terlebih dahulu',
                    'max_size' => 'file yang anda pilih terlalu besar',
                    'is_image' => 'file yang anda pilih bukan gambar',
                    'mime_in' => 'file yang anda pilih bukan gambar',
                ]
            ]
        ];

        if ($this->validate($validation_rules)) {
            //ambil file
            $fileGambar = $this->request->getFile('gambar');
            //bangkitkan nama acak
            $namaFileGambar = $fileGambar->getRandomName();
            //pindah ke public/img
            $fileGambar->move('imgs/user_upload', $namaFileGambar);

            $data = [
                'judul'         => $this->request->getPost('judul'),
                'idkategori'    => $this->request->getPost('kategori'),
                'isi_post'      => $this->request->getPost('isi'),
                'gambar'        => $namaFileGambar,
                'idpenulis'     => $session->id
            ];
            //dd($data);
            $query = $this->post->addPost($data);
            if ($query) {
                session()->setFlashdata('success', 'Post data has been updated');
                return redirect()->to(base_url('artikel/index'));
            }
        } else {
            return redirect()->to(base_url('artikel/add'))->withInput();
        }
    }

    public function update($idpost)
    {
        $session = \Config\Services::session();
        $idpenulis = $session->id;

        $validation_rules = [
            'judul' => [
                'rules' => 'required|min_length[5]|max_length[50]',
                'label' => 'Name'
            ],
            'kategori'      => 'required',
            'isi'           => 'required',
            'gambar'        => [
                'rules' => 'max_size[gambar,10486]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'file yang anda pilih terlalu besar',
                    'is_image' => 'file yang anda pilih bukan gambar',
                    'mime_in' => 'file yang anda pilih bukan gambar',
                ]
            ]
        ];

        if ($this->validate($validation_rules)) {

            $fileGambar = $this->request->getFile('gambar');
            $namaFileGambarLama = $this->request->getVar('gambarLama');

            //apakah user tidak upload gamabr
            if ($fileGambar->getError(4)) {
                $namaFileGambar = $namaFileGambarLama;
            } else {
                //ganti nama file jadi random
                $namaFileGambar = $fileGambar->getRandomName();

                //pindahkan dari tmp ke img
                $fileGambar->move('imgs/user_upload', $namaFileGambar);

                //hapus file lama
                unlink('imgs/user_upload/' . $namaFileGambarLama);
            }

            $data = [
                'judul'         => $this->request->getPost('judul'),
                'idkategori'    => $this->request->getPost('kategori'),
                'isi_post'      => $this->request->getPost('isi'),
                'gambar'        => $namaFileGambar,
            ];

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
            if ($data['row']->idpenulis == $session->id) {
                return view('templates/main', ['page' => 'penulis/delete_post', 'data' => $data]);
            } else {
                return redirect()->to(base_url('artikel'));
            }
        } else {
            return view('templates/main', ['page' => 'penulis/loginPenulis', 'data' => $data]);
        }
    }

    public function del($idpost)
    {
        //mengambil artikel
        $artikel = $this->post->find($idpost);

        //hapus gambar
        unlink('imgs/user_upload/' . $artikel['gambar']);

        $penulis = $this->post->getPost($idpost);
        $query = $this->post->delPost($idpost);
        if ($query) {
            session()->setFlashdata('success', 'Post data has been deleted');
            return redirect()->to(base_url('artikel/index/' . $penulis->idpenulis));
        }
    }
}
