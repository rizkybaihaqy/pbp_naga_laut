<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
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
}
?>