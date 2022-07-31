<?php

class M_jabatan extends CI_Model
{
	protected $_table = 'jabatan';

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	// public function jumlah(){
	// 	$query = $this->db->get($this->_table);
	// 	return $query->num_rows();
	// }

	public function getjabatanid()
	{
		$sql = "SELECT (substring(IFNULL(MAX(id_jabatan),0),4)+0) as hsl FROM " . $this->_table;
		$query = $this->db->query($sql);
		$hasil = $query->result_array();
		foreach ($hasil as $cacah) :
			$jml_data = $cacah['hsl'];
		endforeach;
		$id = 'JBT';
		$nomor = str_pad(($jml_data + 1), 3, "0", STR_PAD_LEFT); //ID-001
		$id = $id . $nomor;
		return $id;
	}
	public function get_jabatan()
	{
		$query = $this->db->get('jabatan');
		return $query->result_array();
	}
	

	public function getDataPelanggan()
	{
		return $this->db->get('jabatan');
	}


	public function getDataEdit($id_jabatan)
	{
		$sql = "SELECT * ";
		$sql = $sql . "FROM " . $this->_table . " WHERE id_jabatan = " . $this->db->escape($id_jabatan);
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDataOrderByNama3($id_transaksi){
        $sql 	= "SELECT * ";
        $sql 	= $sql." FROM ".$this->_table;
        $sql 	= $sql." WHERE id_jabatan NOT IN ";
        $sql 	= $sql." (SELECT id_jabatan FROM detail_tabungan WHERE id_transaksi = '".$id_transaksi."') ";
        $sql 	= $sql." ORDER BY nama_jabatan ASC";
        $query 	= $this->db->query($sql);
        return $query->result_array();
    }


	public function updateFormInput($id_jabatan)
	{
		$post = $this->input->post();
		$this->id_jabatan = $post['id_jabatan'];
		$this->nama_jabatan = $post["nama_jabatan"];
		$this->gaji = $post["gaji"];
		// $this->stok = $post["stok"];

		$sql = "UPDATE " . $this->_table;
		$sql = $sql . " SET nama_jabatan = " . $this->db->escape($this->nama_jabatan);
		$sql = $sql . ", gaji= " . $this->db->escape($this->gaji);
		$sql = $sql . " WHERE id_jabatan = " . $this->db->escape($this->id_jabatan);
		$query = $this->db->query($sql);
		return $this->db->affected_rows();
	}
	public function getDataOrderByNama(){
        $this->db->order_by('nama_jabatan', 'ASC');
        $query = $this->db->get($this->_table);
        return $query->result_array();
    }

	public function tambah($data)
	{
		$simpan = $this->db->insert($this->_table, $data);
		if ($simpan) {
			return 1;
		} else {
			return 0;
		}
	}
}
