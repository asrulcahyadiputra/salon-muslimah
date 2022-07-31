<?php

namespace App\Controllers;

use App\Models\UserProfileModel;
use App\Models\StockModel;
use App\Models\JenisServiceModel;
use App\Models\JenisTransaksiLainnyaModel;
use App\Models\JenisBebanModel;

class User extends BaseController
{
    protected $db, $builder;
    protected $StockModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->UserProfileModel = new UserProfileModel();
        $this->StockModel = new StockModel();
        $this->JenisServiceModel = new JenisServiceModel();
        $this->JenisTransaksiLainnyaModel = new JenisTransaksiLainnyaModel();
        $this->JenisBebanModel = new JenisBebanModel();
    }
    public function index()
    {

        // $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        // $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $this->builder->where('users.id', $id);
        // $query = $this->builder->get();

        // $users = new \Myth\Auth\Models\UserModel();
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'user/index',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
            // 'users' => $query->getRow()
        ];
        return view('wrapp', $data);
    }
    public function edit()
    {

        // $this->builder->select('users.id as userid, username, email, fullname, user_image, name');
        // $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $this->builder->where('users.id', $id);
        // $query = $this->builder->get();

        // $users = new \Myth\Auth\Models\UserModel();
        $data = [
            'dataStockBahan' => $this->StockModel->getDataStockBahan(),
            'title' => 'Home',
            'tampil' => 'user/edit',
            'dataJenisService' => $this->JenisServiceModel->get(),
            'dataJenisTransaksiLainnya' => $this->JenisTransaksiLainnyaModel->get(),
            'dataJenisBeban' => $this->JenisBebanModel->getDataJenisBeban()
            // 'users' => $query->getRow()
        ];
        return view('wrapp', $data);
    }
    public function update($id)
    {
        $fileSampul = $this->request->getFile('user_image');
        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // hapus file yang lama
            // cek jika file gambarnya admin.png
            if ($this->request->getVar('sampulLama') != 'admin.png') {
                // hapus gambar
                unlink('img/' . $this->request->getVar('sampulLama'));
            }
        }

        $this->UserProfileModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'user_image' => $namaSampul
        ]);

        return redirect()->to('/user');
    }
}
