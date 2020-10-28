<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    public function endSession(){
        $session = \Config\Services::session();
        if(isset($_SESSION['username'])){
            unset($_SESSION['username']);
            session_destroy();
        }
        $data = [
            'session'       => \Config\Services::session(),
            'title'         => 'Web',
            'validation'    => \Config\Services::validation(),
        ];
        return view('templates/main',['page' => 'penulis/loginPenulis', 'data' => $data]);
    }
}
?>