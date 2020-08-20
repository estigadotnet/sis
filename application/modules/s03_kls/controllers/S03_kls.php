<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class S03_kls extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('S03_kls_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 's03_kls/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 's03_kls/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 's03_kls/index.html';
            $config['first_url'] = base_url() . 's03_kls/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->S03_kls_model->total_rows($q);
        $s03_kls = $this->S03_kls_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            's03_kls_data' => $s03_kls,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('s03_kls/s03_kls_list', $data);
        $data['_view']    = 'S03_kls/s03_kls_list';
        $data['_caption'] = 'Kelas';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->S03_kls_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idkls' => $row->idkls,
		'Nama' => $row->Nama,
	    );
            // $this->load->view('s03_kls/s03_kls_read', $data);
            $data['_view']    = 'S03_kls/s03_kls_read';
            $data['_caption'] = 'Kelas';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s03_kls'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('s03_kls/create_action'),
	    'idkls' => set_value('idkls'),
	    'Nama' => set_value('Nama'),
	);
        // $this->load->view('s03_kls/s03_kls_form', $data);
        $data['_view']    = 'S03_kls/s03_kls_form';
        $data['_caption'] = 'Kelas';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
	    );

            $this->S03_kls_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('s03_kls'));
        }
    }

    public function update($id)
    {
        $row = $this->S03_kls_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('s03_kls/update_action'),
		'idkls' => set_value('idkls', $row->idkls),
		'Nama' => set_value('Nama', $row->Nama),
	    );
            // $this->load->view('s03_kls/s03_kls_form', $data);
            $data['_view']    = 'S03_kls/s03_kls_form';
            $data['_caption'] = 'Kelas';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s03_kls'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkls', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
	    );

            $this->S03_kls_model->update($this->input->post('idkls', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('s03_kls'));
        }
    }

    public function delete($id)
    {
        $row = $this->S03_kls_model->get_by_id($id);

        if ($row) {
            $this->S03_kls_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('s03_kls'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s03_kls'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('idkls', 'idkls', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "s03_kls.xls";
        $judul = "s03_kls";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->S03_kls_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=s03_kls.doc");

        $data = array(
            's03_kls_data' => $this->S03_kls_model->get_all(),
            'start' => 0
        );

        $this->load->view('S03_kls/s03_kls_doc',$data);
    }

}

/* End of file S03_kls.php */
/* Location: ./application/controllers/S03_kls.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 09:50:19 */
/* http://harviacode.com */
