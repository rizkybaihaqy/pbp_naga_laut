<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{

    public function getPost($id = false)
    {
        if ($id === false) {
            $query = $this->db->query("SELECT * FROM post
                                        JOIN penulis
                                        ON post.idpenulis = penulis.idpenulis);
                                        ORDER BY 'tgl_insert' DESC");
            $results = $query->getResult();
        } else {
            $query = $this->db->query("SELECT * FROM post 
                                        JOIN penulis
                                        ON post.idpenulis = penulis.idpenulis 
                                        WHERE idpost=" . $id . " ");
            $results = $query->getRow();
        }
        return $results;
    }

    public function getPostByCategory($category)
    {
        $query = $this->db->query("SELECT * FROM post 
                                    JOIN kategori 
                                    ON post.idkategori = kategori.idkategori 
                                    WHERE kategori.idkategori=" . $category . " ");
        $results = $query->getResult();
        return $results;
    }

    public function search($keyword)
    {
        $query = $this->db->query("SELECT * FROM post
                                    JOIN penulis
                                    ON post.idpenulis = penulis.idpenulis 
                                    WHERE judul 
                                    LIKE '%" . $keyword . "%' 
                                    OR isi_post LIKE '%" . $keyword . "%' 
                                    ORDER BY tgl_insert DESC");
        $results = $query->getResult();
        return $results;
    }
}
