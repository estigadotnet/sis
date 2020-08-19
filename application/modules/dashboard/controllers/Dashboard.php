<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function index() {
    $data['_view']    = 'dashboard';
    $data['_caption'] = 'Dashboard';
    $this->load->view('dashboard/_layout', $data);
  }
}
