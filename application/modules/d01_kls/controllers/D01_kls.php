<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class D01_kls extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('D01_kls_model');
        $this->load->library('form_validation');
        $this->load->library('grocery_CRUD');
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'd01_kls/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'd01_kls/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'd01_kls/index.html';
            $config['first_url'] = base_url() . 'd01_kls/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->D01_kls_model->total_rows($q);
        $d01_kls = $this->D01_kls_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'd01_kls_data' => $d01_kls,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('d01_kls/d01_kls_list', $data);
        $data['_view']    = 'D01_kls/d01_kls_list';
        $data['_caption'] = 'Daftar Kelas';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->D01_kls_model->get_by_id($id);
        if ($row) {
            $data = array(
		'iddkls' => $row->iddkls,
		'idthaj' => $row->idthaj,
		'idsklh' => $row->idsklh,
		'idkls' => $row->idkls,
	    );
            // $this->load->view('d01_kls/d01_kls_read', $data);
            $data['_view']    = 'D01_kls/d01_kls_read';
            $data['_caption'] = 'Daftar Kelas';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('d01_kls'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('d01_kls/create_action'),
	    'iddkls' => set_value('iddkls'),
	    'idthaj' => set_value('idthaj'),
	    'idsklh' => set_value('idsklh'),
	    'idkls' => set_value('idkls'),
	);
        // $this->load->view('d01_kls/d01_kls_form', $data);
        $data['_view']    = 'D01_kls/d01_kls_form';
        $data['_caption'] = 'Daftar Kelas';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idthaj' => $this->input->post('idthaj',TRUE),
		'idsklh' => $this->input->post('idsklh',TRUE),
		'idkls' => $this->input->post('idkls',TRUE),
	    );

            $this->D01_kls_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('d01_kls'));
        }
    }

    public function update($id)
    {
        $row = $this->D01_kls_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('d01_kls/update_action'),
		'iddkls' => set_value('iddkls', $row->iddkls),
		'idthaj' => set_value('idthaj', $row->idthaj),
		'idsklh' => set_value('idsklh', $row->idsklh),
		'idkls' => set_value('idkls', $row->idkls),
	    );
            // $this->load->view('d01_kls/d01_kls_form', $data);
            $data['_view']    = 'D01_kls/d01_kls_form';
            $data['_caption'] = 'Daftar Kelas';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('d01_kls'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('iddkls', TRUE));
        } else {
            $data = array(
		'idthaj' => $this->input->post('idthaj',TRUE),
		'idsklh' => $this->input->post('idsklh',TRUE),
		'idkls' => $this->input->post('idkls',TRUE),
	    );

            $this->D01_kls_model->update($this->input->post('iddkls', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('d01_kls'));
        }
    }

    public function delete($id)
    {
        $row = $this->D01_kls_model->get_by_id($id);

        if ($row) {
            $this->D01_kls_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('d01_kls'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('d01_kls'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idthaj', 'idthaj', 'trim|required');
	$this->form_validation->set_rules('idsklh', 'idsklh', 'trim|required');
	$this->form_validation->set_rules('idkls', 'idkls', 'trim|required');

	$this->form_validation->set_rules('iddkls', 'iddkls', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "d01_kls.xls";
        $judul = "d01_kls";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idthaj");
	xlsWriteLabel($tablehead, $kolomhead++, "Idsklh");
	xlsWriteLabel($tablehead, $kolomhead++, "Idkls");

	foreach ($this->D01_kls_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idthaj);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idsklh);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idkls);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=d01_kls.doc");

        $data = array(
            'd01_kls_data' => $this->D01_kls_model->get_all(),
            'start' => 0
        );

        $this->load->view('D01_kls/d01_kls_doc',$data);
    }

    public function _example_output($output = null) {
      //$output->_view    = 'd01_kls/d01_kls_form2';
  		$output->_caption = 'Daftar Kelas';
  		$this->load->view('dashboard/_layout', (array)$output);
    }

    // public function create2() {
    public function index2() {
      $crud = new grocery_CRUD();
      // $crud->set_theme('datatables');
      $crud->set_table('d01_kls');
      $crud->set_relation('idthaj', 'db_sis.s01_thaj', 'TahunAjaran');
      $crud->set_relation('idsklh', 'db_sis.s02_sklh', 'Nama');
      $crud->set_relation('idkls', 's03_kls', 'Nama');
      $crud->set_relation_n_n('siswa', 'd02_ssw', 's05_ssw', 'iddkls', 'idssw', 'Nama');
      $crud->display_as('idthaj', 'Tahun Ajaran');
      $crud->display_as('idsklh', 'Sekolah');
      $crud->display_as('idkls', 'Kelas');
      $crud->set_subject('Daftar Kelas');
      $output = $crud->render();
      $this->_example_output($output);
    }

}

/* End of file D01_kls.php */
/* Location: ./application/controllers/D01_kls.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 18:11:31 */
/* http://harviacode.com */
