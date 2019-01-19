<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$base_url = "http://".$_SERVER['HTTP_HOST'].
str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$config['googleplus']['application_name'] = 'Login Tabunganku';
$config['googleplus']['client_id']        = '294258541416-ill1qcriuhkr21qhqf97ghiofnjdp4f2.apps.googleusercontent.com';
$config['googleplus']['client_secret']    = 'n2PvjgnJVG1PLPRS2qPSP-OJ';
$config['googleplus']['redirect_uri']     = $base_url;
// $config['googleplus']['redirect_uri']     = 'http://localhost/Tabunganku/';
$config['googleplus']['api_key']          = '';
$config['googleplus']['scopes']           = array();

?>