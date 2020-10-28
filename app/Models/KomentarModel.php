<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table      = 'komentar';
    protected $primaryKey = 'idkomentar';
    protected $useTimestamps = true;
    protected $allowedFields = ['idpost', 'idpenulis', 'isi'];
    protected $createdField  = 'tgl_update';
    protected $updatedField  = 'tgl_update';
    protected $dateFormat = 'date';

    // public function getKomentar($id, $idKomentar)
    // {
    //     //SELECT * FROM `komentar` JOIN `penulis` ON `komentar`.`idpenulis`=`penulis`.`idpenulis` 
    //     $query = $this->db->query("SELECT * FROM komentar 
    //                                 JOIN penulis 
    //                                 ON komentar.idpenulis = penulis.idpenulis 
    //                                 WHERE idpost=" . $id . " AND idkomentar=" . $idKomentar . " ");
    //     $results = $query->getResult();
    //     return $results;
    // }

    public function getKomentar($id)
    {
        //SELECT * FROM `komentar` JOIN `penulis` ON `komentar`.`idpenulis`=`penulis`.`idpenulis` 
        $query = $this->db->query("SELECT * FROM komentar 
                                    JOIN penulis 
                                    ON komentar.idpenulis = penulis.idpenulis 
                                    WHERE idpost=" . $id . " ");
        $results = $query->getResult();
        return $results;
    }

    public function addKomentar($data)
    {
        $query = $this->insert($data);
        return $query;
    }

    public function delKomentar($id)
    {
        $query = $this->delete(['id' => $id]);
        return $query;
    }
}
