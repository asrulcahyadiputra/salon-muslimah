<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table = 'tb_jurnal';
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function generateJurnal($id_ref, $tgl_jurnal, $no_coa, $keterangan, $posisi_d_c, $nominal)
    {
        $data = [
            'id_referensi' => $id_ref,
            'tgl_jurnal' => $tgl_jurnal,
            'no_coa' => $no_coa,
            'keterangan' => $keterangan,
            'posisi_d_c' => $posisi_d_c,
            'nominal' => $nominal,
        ];

        $q = $this->db->table('tb_jurnal')
        ->insert($data);

        return $q;
    }
}
