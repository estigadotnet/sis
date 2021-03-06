<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class S05_ssw extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('S05_ssw_model');
        $this->load->library('form_validation');
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 's05_ssw/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 's05_ssw/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 's05_ssw/index.html';
            $config['first_url'] = base_url() . 's05_ssw/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->S05_ssw_model->total_rows($q);
        $s05_ssw = $this->S05_ssw_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            's05_ssw_data' => $s05_ssw,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('s05_ssw/s05_ssw_list', $data);
        $data['_view']    = 'S05_ssw/s05_ssw_list';
        $data['_caption'] = 'Siswa';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->S05_ssw_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idssw' => $row->idssw,
		'NIS' => $row->NIS,
		'Nama' => $row->Nama,
	    );
            // $this->load->view('s05_ssw/s05_ssw_read', $data);
            $data['_view']    = 'S05_ssw/s05_ssw_read';
            $data['_caption'] = 'Siswa';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s05_ssw'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('s05_ssw/create_action'),
	    'idssw' => set_value('idssw'),
	    'NIS' => set_value('NIS'),
	    'Nama' => set_value('Nama'),
	);
        // $this->load->view('s05_ssw/s05_ssw_form', $data);
        $data['_view']    = 'S05_ssw/s05_ssw_form';
        $data['_caption'] = 'Siswa';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NIS' => $this->input->post('NIS',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
	    );

            $this->S05_ssw_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('s05_ssw'));
        }
    }

    public function update($id)
    {
        $row = $this->S05_ssw_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('s05_ssw/update_action'),
		'idssw' => set_value('idssw', $row->idssw),
		'NIS' => set_value('NIS', $row->NIS),
		'Nama' => set_value('Nama', $row->Nama),
	    );
            // $this->load->view('s05_ssw/s05_ssw_form', $data);
            $data['_view']    = 'S05_ssw/s05_ssw_form';
            $data['_caption'] = 'Siswa';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s05_ssw'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idssw', TRUE));
        } else {
            $data = array(
		'NIS' => $this->input->post('NIS',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
	    );

            $this->S05_ssw_model->update($this->input->post('idssw', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('s05_ssw'));
        }
    }

    public function delete($id)
    {
        $row = $this->S05_ssw_model->get_by_id($id);

        if ($row) {
            $this->S05_ssw_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('s05_ssw'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('s05_ssw'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('NIS', 'nis', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('idssw', 'idssw', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "s05_ssw.xls";
        $judul = "s05_ssw";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NIS");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->S05_ssw_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NIS);
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
        header("Content-Disposition: attachment;Filename=s05_ssw.doc");

        $data = array(
            's05_ssw_data' => $this->S05_ssw_model->get_all(),
            'start' => 0
        );

        $this->load->view('S05_ssw/s05_ssw_doc',$data);
    }

}

/* End of file S05_ssw.php */
/* Location: ./application/controllers/S05_ssw.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 17:12:11 */
/* http://harviacode.com */
