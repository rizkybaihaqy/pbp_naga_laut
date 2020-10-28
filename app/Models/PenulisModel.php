<?php namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    public function getPenulis($id=false)
	{
		if($id === false){
			$query = $this->db->query('SELECT * FROM penulis');
			$results = $query->getResult();
		}else{
			$query = $this->db->query("SELECT * FROM penulis WHERE idpenulis=".$id." ");
			$results = $query->getRow();
		}
		return $results;
    }
    
    public function getPost($id=false)
	{
		if($id === false){
			$query = $this->db->query('SELECT * FROM kategori JOIN post ON kategori.idkategori=post.idkategori');
			$results = $query->getResult();
		}else{
			$query = $this->db->query("SELECT * FROM kategori JOIN post ON kategori.idkategori=post.idkategori WHERE idkategori=".$id." ");
			$results = $query->getRow();
		}
		return $results;
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

    // public function addCategory($data)
    // {
    //     $query = $this->db->table('kategori')->insert($data);
    //     return $query;
    // }

    // public function delCategory($id)
    // {
    //     $query = $this->db->table('kategori')->delete(['idkategori' => $id]);
    //     return $query;
    // }
}
?>