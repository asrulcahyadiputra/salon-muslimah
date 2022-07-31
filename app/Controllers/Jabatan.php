<?php

class Jabatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model('M_jabatan');
    }


    public function index()
    {
        $data['id_jabatan'] = $this->M_jabatan->getjabatanid();
        $data['all_jabatan'] = $this->M_jabatan->get_jabatan();

        $this->template->load('template/template', 'jabatan/tampilan_tabel_data', $data);
    }
    public function edit_form($id_jabatan)
    {
        if (!isset($id_jabatan)) redirect('jabatan/index');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $data_form_input = $this->M_jabatan->getDataEdit($id_jabatan);

        $this->form_validation->set_rules(
            'nama_jabatan',
            'Nama jabatan',
            'required|alpha_numeric_spaces',
            array(
                'required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces' => '%s hanya boleh berisi angka, huruf A-Z dan spasi'
            )
        );
      
        $this->form_validation->set_rules(
            'gaji',
            'Gaji',
            'required|alpha_numeric_spaces',
            array(
                'required' => 'Anda harus memasukkan %s.',
                'alpha_numeric_spaces' => '%s hanya boleh berisi angka, huruf A-Z dan spasi'
            )
        );


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><li>', '</li></div>');
        if ($this->form_validation->run()) {
            $this->M_jabatan->updateFormInput($id_jabatan);
            redirect('jabatan/index');
        }
        $data["data_form_input"] = $data_form_input;
        if (!$data["data_form_input"]) show_404();
        $this->template->load('template/template', 'jabatan/form_edit_data', $data);
    }

    // public function delete_form($id_jabatan)
    // {
    //     if (!isset($id_jabatan)) show_404();
    //     if ($this->M_jabatan->deleteFormInput($id_jabatan)) {
    //         echo 'Berhasil menghapus data dengan id_jabatan     = ' . $id_jabatan;
    //         redirect(site_url('jabatan/index'));
    //     }
    // }
    public function tambah()
    {
        $this->data['id_jabatan'] = $this->M_jabatan->getjabatanid();

        $this->load->view('jabatan/form_input', $this->data);
    }

    public function proses_tambah()
    {


        $data = [
            'id_jabatan' => $this->input->post('id_jabatan'),
            'nama_jabatan' => $this->input->post('nama_jabatan'),
            'gaji' => $this->input->post('gaji'),

        ];
        $this->data['id_jabatan'] = $this->M_jabatan->getjabatanid();
        $simpan = $this->M_jabatan->tambah($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 12l5 5l10 -10" /><path d="M2 12l5 5m5 -5l5 -5" /></svg>
                    Data Berhasil Disimpan
                  </div>');
            redirect('jabatan');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><line x1="12" y1="8" x2="12.01" y2="8" /><polyline points="11 12 12 12 12 16 13 16" /></svg>
                    Data Gagal Disimpan
                  </div>');
            redirect('jabatan');
        }
    }

    // public function delete($id_jabatan)
    // {
    //     if (!isset($id)) show_404();

    //     if ($this->M_jabatan->deleteFormInput($id)) {
    //         redirect(site_url('jabatan/index'));
    //     }
    // }
}
