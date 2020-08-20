<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class D02_ssw extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('D02_ssw_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'd02_ssw/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'd02_ssw/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'd02_ssw/index.html';
            $config['first_url'] = base_url() . 'd02_ssw/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->D02_ssw_model->total_rows($q);
        $d02_ssw = $this->D02_ssw_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'd02_ssw_data' => $d02_ssw,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('d02_ssw/d02_ssw_list', $data);
        $data['_view']    = 'D02_ssw/d02_ssw_list';
        $data['_caption'] = 'Daftar Siswa';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->D02_ssw_model->get_by_id($id);
        if ($row) {
            $data = array(
		'iddssw' => $row->iddssw,
		'iddkls' => $row->iddkls,
		'idssw' => $row->idssw,
	    );
            // $this->load->view('d02_ssw/d02_ssw_read', $data);
            $data['_view']    = 'D02_ssw/d02_ssw_read';
            $data['_caption'] = 'Daftar Siswa';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('d02_ssw'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('d02_ssw/create_action'),
	    'iddssw' => set_value('iddssw'),
	    'iddkls' => set_value('iddkls'),
	    'idssw' => set_value('idssw'),
	);
        // $this->load->view('d02_ssw/d02_ssw_form', $data);
        $data['_view']    = 'D02_ssw/d02_ssw_form';
        $data['_caption'] = 'Daftar Siswa';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'iddkls' => $this->input->post('iddkls',TRUE),
		'idssw' => $this->input->post('idssw',TRUE),
	    );

            $this->D02_ssw_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('d02_ssw'));
        }
    }

    public function update($id)
    {
        $row = $this->D02_ssw_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('d02_ssw/update_action'),
		'iddssw' => set_value('iddssw', $row->iddssw),
		'iddkls' => set_value('iddkls', $row->iddkls),
		'idssw' => set_value('idssw', $row->idssw),
	    );
            // $this->load->view('d02_ssw/d02_ssw_form', $data);
            $data['_view']    = 'D02_ssw/d02_ssw_form';
            $data['_caption'] = 'Daftar Siswa';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('d02_ssw'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('iddssw', TRUE));
        } else {
            $data = array(
		'iddkls' => $this->input->post('iddkls',TRUE),
		'idssw' => $this->input->post('idssw',TRUE),
	    );

            $this->D02_ssw_model->update($this->input->post('iddssw', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('d02_ssw'));
        }
    }

    public function delete($id)
    {
        $row = $this->D02_ssw_model->get_by_id($id);

        if ($row) {
            $this->D02_ssw_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('d02_ssw'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('d02_ssw'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('iddkls', 'iddkls', 'trim|required');
	$this->form_validation->set_rules('idssw', 'idssw', 'trim|required');

	$this->form_validation->set_rules('iddssw', 'iddssw', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "d02_ssw.xls";
        $judul = "d02_ssw";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Iddkls");
	xlsWriteLabel($tablehead, $kolomhead++, "Idssw");

	foreach ($this->D02_ssw_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->iddkls);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idssw);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=d02_ssw.doc");

        $data = array(
            'd02_ssw_data' => $this->D02_ssw_model->get_all(),
            'start' => 0
        );

        $this->load->view('D02_ssw/d02_ssw_doc',$data);
    }

}

/* End of file D02_ssw.php */
/* Location: ./application/controllers/D02_ssw.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 18:11:42 */
/* http://harviacode.com */
