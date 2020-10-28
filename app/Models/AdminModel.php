<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    /*** Category  ***/
    public function getCategory($id=false)
	{
		if($id === false){
			$query = $this->db->query('SELECT * FROM kategori');
			$results = $query->getResult();
		}else{
			$query = $this->db->query("SELECT * FROM kategori WHERE idkategori=".$id." ");
			$results = $query->getRow();
		}
		return $results;
    }
    
    public function editCategory($data, $id)
    {
        $query = $this->db->table('kategori')->update($data,['idkategori' => $id]);
        return $query;
    }

    public function addCategory($data)
    {
        $query = $this->db->table('kategori')->insert($data);
        return $query;
    }

    public function delCategory($id)
    {
        $query = $this->db->table('kategori')->delete(['idkategori' => $id]);
        return $query;
    }

    /*** Penulis ***/
    public function getPenulis($id=false)
    {
        if($id === false){
			$query = $this->db->table('penulis')->get();
			$results = $query->getResult();
		}else{
			$query = $this->db->table('penulis')->getWhere(['idpenulis' => $id]);
			$results = $query->getRow();
		}
		return $results;
    }

    public function getPenulisByEmail($email)
    {
        $query = $this->db->table('penulis')->getWhere(['email' => $email]);
        $results = $query->getRow();

        return $results;
    }

    public function reset($data, $id)
    {
        $query = $this->db->table('penulis')->update($data,['idpenulis' => $id]);
        return $query;
    }

    public function editProfile($data, $id)
    {
        $query = $this->db->table('penulis')->update($data,['idpenulis' => $id]);
        return $query;
    }

    public function editPassword($data, $id)
    {
        $query = $this->db->table('penulis')->update($data,['idpenulis' => $id]);
        return $query;
    }

    public function cekPassword($password, $id)
    {
        $query = $this->db->query("SELECT * FROM penulis WHERE idpenulis=".$id." AND password='".$password."'");
        $result = $query->getRow();
        return $result;
    }

    /*** Post ***/
    public function getAllPost($id)
    {
        $builder = $this->db->table('post');
        $builder->join('kategori', 'post.idkategori = kategori.idkategori');
        $query = $builder->getWhere(['idpenulis' => $id]);
		$results = $query->getResult();
		return $results;
    }

    public function getPost($idpost)
    {
        $builder = $this->db->table('post');
        $builder->join('kategori', 'post.idkategori = kategori.idkategori');
        $query = $builder->getWhere(['idpost' => $idpost]);
        $results = $query->getRow();
        return $results;
    }

    public function editPost($data, $id)
    {
        $query = $this->db->table('post')->update($data,['idpost' => $id]);
        return $query;
    }

    public function addPost($data)
    {
        $query = $this->db->table('post')->insert($data);
        return $query;
    }
    public function delPost($id)
    {
        $query = $this->db->table('post')->delete(['idpost' => $id]);
        return $query;
    }

    /*** Admin ***/
    public function getAdmin($id=false)
	{
		if($id === false){
			$query = $this->db->query('SELECT * FROM admin');
			$results = $query->getResult();
		}else{
			$query = $this->db->query("SELECT * FROM admin WHERE idadmin=".$id." ");
			$results = $query->getRow();
		}
		return $results;
    }
    
    public function getAdminByEmail($email)
    {
        $query = $this->db->table('admin')->getWhere(['email' => $email]);
        $results = $query->getRow();

        return $results;
    }

    public function getSumPost($id=false)
	{
		if($id === false){
			$query = $this->db->query('SELECT * FROM post JOIN kategori ON post.idkategori=kategori.idkategori');
			$results = $query->getResult();
		}else{
			$query = $this->db->query("SELECT * FROM post JOIN kategori ON post.idkategori=kategori.idkategori WHERE post.idkategori=".$id." ");
			$results = $query->getRow();
		}
		return $results;
    }

    public function editPasswordAdmin($data, $id)
    {
        $query = $this->db->table('admin')->update($data,['idadmin' => $id]);
        return $query;
    }

    public function cekPasswordAdmin($password, $id)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE idadmin=".$id." AND password='".$password."'");
        $result = $query->getRow();
        return $result;
    }

    /*** Login & Signup ***/
    public function loginAdmin($email,$password)
    {
			$query = $this->db->query("SELECT * FROM admin WHERE email='".$email."'AND password='".$password."' ");
			$results = $query->getRow();

		return $results;
    }

    public function loginPenulis($email,$password)
    {
			$query = $this->db->query("SELECT * FROM penulis WHERE email='".$email."'AND password='".$password."' ");
			$results = $query->getRow();

		return $results;
    }

    public function signup($data)
    {
        $query = $this->db->table('penulis')->insert($data);
        return $query;
    }
}
?>