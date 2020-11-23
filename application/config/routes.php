<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'pages/view';

$route['(any)'] = 'pages/view/$1';
$route['admin'] = 'admin/childprofile';
//$route['admin'] = 'admin/approve';
//$route['adopt/(any)'] = 'adopt/view/$1';
//$route['adopt'] = 'adopt/index/';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
