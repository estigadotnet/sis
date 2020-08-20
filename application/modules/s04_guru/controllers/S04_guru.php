<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class S04_guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('S04_guru_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 's04_guru/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 's04_guru/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 's04_guru/index.html';
            $config['first_url'] = base_url() . 's04_guru/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->S04_guru_model->total_rows($q);
        $s04_guru = $this->S04_guru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            's04_guru_data' => $s04_guru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('s04_guru/s04_guru_list', $data);
        $data['_view']    = 'S04_guru/s04_guru_list';
        $data['_caption'] = 'Guru';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->S04_guru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idguru' => $row->idguru,
		'Nama' => $row->Nama,
	    );
            // $this->load->view('s04_guru/s04_guru_read', $data);
            $data['_view']    = 'S04_guru/s04_guru_read';
            $data['_caption'] = 'Guru';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s04_guru'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('s04_guru/create_action'),
	    'idguru' => set_value('idguru'),
	    'Nama' => set_value('Nama'),
	);
        // $this->load->view('s04_guru/s04_guru_form', $data);
        $data['_view']    = 'S04_guru/s04_guru_form';
        $data['_caption'] = 'Guru';
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

            $this->S04_guru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('s04_guru'));
        }
    }

    public function update($id)
    {
        $row = $this->S04_guru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('s04_guru/update_action'),
		'idguru' => set_value('idguru', $row->idguru),
		'Nama' => set_value('Nama', $row->Nama),
	    );
            // $this->load->view('s04_guru/s04_guru_form', $data);
            $data['_view']    = 'S04_guru/s04_guru_form';
            $data['_caption'] = 'Guru';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s04_guru'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idguru', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
	    );

            $this->S04_guru_model->update($this->input->post('idguru', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('s04_guru'));
        }
    }

    public function delete($id)
    {
        $row = $this->S04_guru_model->get_by_id($id);

        if ($row) {
            $this->S04_guru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('s04_guru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s04_guru'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('idguru', 'idguru', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "s04_guru.xls";
        $judul = "s04_guru";
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

	foreach ($this->S04_guru_model->get_all() as $data) {
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
        header("Content-Disposition: attachment;Filename=s04_guru.doc");

        $data = array(
            's04_guru_data' => $this->S04_guru_model->get_all(),
            'start' => 0
        );

        $this->load->view('S04_guru/s04_guru_doc',$data);
    }

}

/* End of file S04_guru.php */
/* Location: ./application/controllers/S04_guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 17:02:33 */
/* http://harviacode.com */
