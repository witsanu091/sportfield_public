<?php
defined('BASEPATH') or exit('No direct script access allowed');

$hook['Login'] = array(
    'class'    => 'Login',
    'function' => 'login',
    'filename' => 'Login.php',
    'filepath' => 'hooks',
    // 'params'   => array('admin')
    'params'   => ''
);
$hook['Login'] = array(
    'class'    => 'User',
    'function' => 'all',
    'filename' => 'User.php',
    'filepath' => 'hooks',
    // 'params'   => array('admin')
    'params'   => ''
);
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/