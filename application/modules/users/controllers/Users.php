<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('users/users_list', $data);
        $data['_view']    = 'Users/users_list';
        $data['_caption'] = 'Users';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'ip_address' => $row->ip_address,
		'username' => $row->username,
		'password' => $row->password,
		'email' => $row->email,
		'activation_selector' => $row->activation_selector,
		'activation_code' => $row->activation_code,
		'forgotten_password_selector' => $row->forgotten_password_selector,
		'forgotten_password_code' => $row->forgotten_password_code,
		'forgotten_password_time' => $row->forgotten_password_time,
		'remember_selector' => $row->remember_selector,
		'remember_code' => $row->remember_code,
		'created_on' => $row->created_on,
		'last_login' => $row->last_login,
		'active' => $row->active,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'company' => $row->company,
		'phone' => $row->phone,
	    );
            // $this->load->view('users/users_read', $data);
            $data['_view']    = 'Users/users_read';
            $data['_caption'] = 'Users';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'ip_address' => set_value('ip_address'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'email' => set_value('email'),
	    'activation_selector' => set_value('activation_selector'),
	    'activation_code' => set_value('activation_code'),
	    'forgotten_password_selector' => set_value('forgotten_password_selector'),
	    'forgotten_password_code' => set_value('forgotten_password_code'),
	    'forgotten_password_time' => set_value('forgotten_password_time'),
	    'remember_selector' => set_value('remember_selector'),
	    'remember_code' => set_value('remember_code'),
	    'created_on' => set_value('created_on'),
	    'last_login' => set_value('last_login'),
	    'active' => set_value('active'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'company' => set_value('company'),
	    'phone' => set_value('phone'),
	);
        // $this->load->view('users/users_form', $data);
        $data['_view']    = 'Users/users_form';
        $data['_caption'] = 'Users';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ip_address' => $this->input->post('ip_address',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'email' => $this->input->post('email',TRUE),
		'activation_selector' => $this->input->post('activation_selector',TRUE),
		'activation_code' => $this->input->post('activation_code',TRUE),
		'forgotten_password_selector' => $this->input->post('forgotten_password_selector',TRUE),
		'forgotten_password_code' => $this->input->post('forgotten_password_code',TRUE),
		'forgotten_password_time' => $this->input->post('forgotten_password_time',TRUE),
		'remember_selector' => $this->input->post('remember_selector',TRUE),
		'remember_code' => $this->input->post('remember_code',TRUE),
		'created_on' => $this->input->post('created_on',TRUE),
		'last_login' => $this->input->post('last_login',TRUE),
		'active' => $this->input->post('active',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'company' => $this->input->post('company',TRUE),
		'phone' => $this->input->post('phone',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }

    public function update($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'ip_address' => set_value('ip_address', $row->ip_address),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'email' => set_value('email', $row->email),
		'activation_selector' => set_value('activation_selector', $row->activation_selector),
		'activation_code' => set_value('activation_code', $row->activation_code),
		'forgotten_password_selector' => set_value('forgotten_password_selector', $row->forgotten_password_selector),
		'forgotten_password_code' => set_value('forgotten_password_code', $row->forgotten_password_code),
		'forgotten_password_time' => set_value('forgotten_password_time', $row->forgotten_password_time),
		'remember_selector' => set_value('remember_selector', $row->remember_selector),
		'remember_code' => set_value('remember_code', $row->remember_code),
		'created_on' => set_value('created_on', $row->created_on),
		'last_login' => set_value('last_login', $row->last_login),
		'active' => set_value('active', $row->active),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'company' => set_value('company', $row->company),
		'phone' => set_value('phone', $row->phone),
	    );
            // $this->load->view('users/users_form', $data);
            $data['_view']    = 'Users/users_form';
            $data['_caption'] = 'Users';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'ip_address' => $this->input->post('ip_address',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'email' => $this->input->post('email',TRUE),
		'activation_selector' => $this->input->post('activation_selector',TRUE),
		'activation_code' => $this->input->post('activation_code',TRUE),
		'forgotten_password_selector' => $this->input->post('forgotten_password_selector',TRUE),
		'forgotten_password_code' => $this->input->post('forgotten_password_code',TRUE),
		'forgotten_password_time' => $this->input->post('forgotten_password_time',TRUE),
		'remember_selector' => $this->input->post('remember_selector',TRUE),
		'remember_code' => $this->input->post('remember_code',TRUE),
		'created_on' => $this->input->post('created_on',TRUE),
		'last_login' => $this->input->post('last_login',TRUE),
		'active' => $this->input->post('active',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'company' => $this->input->post('company',TRUE),
		'phone' => $this->input->post('phone',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }

    public function delete($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('ip_address', 'ip address', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('activation_selector', 'activation selector', 'trim|required');
	$this->form_validation->set_rules('activation_code', 'activation code', 'trim|required');
	$this->form_validation->set_rules('forgotten_password_selector', 'forgotten password selector', 'trim|required');
	$this->form_validation->set_rules('forgotten_password_code', 'forgotten password code', 'trim|required');
	$this->form_validation->set_rules('forgotten_password_time', 'forgotten password time', 'trim|required');
	$this->form_validation->set_rules('remember_selector', 'remember selector', 'trim|required');
	$this->form_validation->set_rules('remember_code', 'remember code', 'trim|required');
	$this->form_validation->set_rules('created_on', 'created on', 'trim|required');
	$this->form_validation->set_rules('last_login', 'last login', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('company', 'company', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Ip Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Activation Selector");
	xlsWriteLabel($tablehead, $kolomhead++, "Activation Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Selector");
	xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Remember Selector");
	xlsWriteLabel($tablehead, $kolomhead++, "Remember Code");
	xlsWriteLabel($tablehead, $kolomhead++, "Created On");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Login");
	xlsWriteLabel($tablehead, $kolomhead++, "Active");
	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Company");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ip_address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activation_selector);
	    xlsWriteLabel($tablebody, $kolombody++, $data->activation_code);
	    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_selector);
	    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->forgotten_password_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remember_selector);
	    xlsWriteLabel($tablebody, $kolombody++, $data->remember_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->created_on);
	    xlsWriteNumber($tablebody, $kolombody++, $data->last_login);
	    xlsWriteLabel($tablebody, $kolombody++, $data->active);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->company);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );

        $this->load->view('Users/users_doc',$data);
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-08-20 06:04:36 */
/* http://harviacode.com */
