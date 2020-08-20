<?php
defined('BASEPATH') or exit('No direct script access allowed');

function pre($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}

function set_dbaktif($dbaktif) {
  $db['dsn']	= '';
  $db['hostname'] = 'localhost';
  $db['username'] = 'root';
  $db['password'] = '';
  $db['database'] = $dbaktif; //$this->session->userdata('dbaktif');
  $db['dbdriver'] = 'mysqli';
  $db['dbprefix'] = '';
  $db['pconnect'] = FALSE;
  $db['db_debug'] = (ENVIRONMENT !== 'production');
  $db['cache_on'] = FALSE;
  $db['cachedir'] = '';
  $db['char_set'] = 'utf8';
  $db['dbcollat'] = 'utf8_general_ci';
  $db['swap_pre'] = '';
  $db['encrypt'] = FALSE;
  $db['compress'] = FALSE;
  $db['stricton'] = FALSE;
  $db['failover'] = array();
  $db['save_queries'] = TRUE;
  $ci =& get_instance();
  $ci->db = $ci->load->database($db, true);
}
